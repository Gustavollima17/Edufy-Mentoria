<?php
session_start();
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/models/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Conexão com o banco de dados
        $database = new Database();
        $db = $database->getConnection();
        
        // Instancia o usuário
        $usuario = new Usuario($db);
        
        // Sanitiza os dados recebidos
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $senha = trim($_POST['senha']);

        // Valida se os campos estão preenchidos
        if (empty($email) || empty($senha)) {
            throw new Exception("Email ou senha não podem estar vazios.");
        }

        // Realiza o login
        $loginResult = $usuario->login($email, $senha);

        if ($loginResult['status']) {
            // Configura os dados da sessão
            $_SESSION['usuario_id'] = $loginResult['data']['id'];
            $_SESSION['nome'] = $loginResult['data']['nome'];
            $_SESSION['is_tutor'] = $loginResult['data']['is_tutor'];

            // Mantém o usuário logado, se solicitado
            if (isset($_POST['keep-logged'])) {
                $token = bin2hex(random_bytes(32));
                setcookie(
                    'auth_token',
                    $token,
                    time() + (86400 * 30), // 30 dias
                    "/",
                    "", // Define o domínio, se necessário
                    isset($_SERVER['HTTPS']), // Secure flag
                    true // HttpOnly flag
                );
            }

            // Redireciona para o painel apropriado
            $redirectPage = $loginResult['data']['is_tutor'] ? "perfil.php" : "perfil.php";
            header("Location: $redirectPage");
            exit();
        } else {
            throw new Exception($loginResult['message']);
        }
    } catch (Exception $e) {
        // Define a mensagem de erro e redireciona
        $_SESSION['login_erro'] = $e->getMessage();
        header("Location: login.php");
        exit();
    }
}
