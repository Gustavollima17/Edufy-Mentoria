<?php
require_once __DIR__ . '/config/database.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia a sessão, se ainda não estiver ativa
}

$pdo = (new Database())->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Validação dos campos obrigatórios
        $requiredFields = [
            'nome', 'dataNascimento', 'email', 'telefone', 'cpf',
            'rua', 'cep', 'estado', 'cidade', 'senha'
        ];
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                throw new Exception("O campo $field é obrigatório.");
            }
        }

        $pdo->beginTransaction();

        // Prepara o SQL de inserção na tabela usuario
        $stmt = $pdo->prepare("
            INSERT INTO usuario (nome, dataNascimento, email, telefone, cpf, rua, cep, estado, cidade, senha)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        // Cria o hash da senha
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        // Executa a query com os dados recebidos
        $stmt->execute([
            $_POST['nome'],
            $_POST['dataNascimento'],
            $_POST['email'],
            $_POST['telefone'],
            $_POST['cpf'],
            $_POST['rua'],
            $_POST['cep'],
            $_POST['estado'],
            $_POST['cidade'],
            $senha
        ]);

        // Obtém o ID do usuário inserido
        $usuario_id = $pdo->lastInsertId();

        // Se a conta for de tutor, insere na tabela formacao
        if ($_POST['tipoConta'] === 'tutor') {
            $stmt = $pdo->prepare("
                INSERT INTO formacao (usuario_id, nivelFormacao, instituicaoFormacao, curso)
                VALUES (?, ?, ?, ?)
            ");
            $stmt->execute([
                $usuario_id,
                $_POST['nivelFormacao'],
                $_POST['instituicaoFormacao'],
                $_POST['curso']
            ]);
        }

        // Confirma a transação
        $pdo->commit();

        // Define mensagem de sucesso e redireciona
        $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
        header("Location: login.php");
        exit();
    } catch (Exception $e) {
        // Desfaz a transação em caso de erro
        $pdo->rollBack();
        // Define mensagem de erro e redireciona
        $_SESSION['erro'] = "Erro ao cadastrar: " . $e->getMessage();
        header("Location: cadastro.php");
        exit();
    }
}
