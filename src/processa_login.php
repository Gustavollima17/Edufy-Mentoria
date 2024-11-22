<?php
session_start();
require_once __DIR__.'/config/database.php';
require_once __DIR__.'/models/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Database();
    $db = $database->getConnection();
    
    $usuario = new Usuario($db);
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    if($usuario->login($email, $senha)) {
        $_SESSION['usuario_id'] = $usuario->id;
        $_SESSION['nome'] = $usuario->nome;
        $_SESSION['is_tutor'] = $usuario->is_tutor;
        
        if(isset($_POST['keep-logged'])) {
            $token = bin2hex(random_bytes(32));
            setcookie('auth_token', $token, time() + (86400 * 30), "/");
        }
        
        if($usuario->is_tutor) {
            header("Location: painel_tutor.php");
        } else {
            header("Location: painel_aluno.php");
        }
        exit();
    } else {
        header("Location: login.php?erro=1");
        exit();
    }
}