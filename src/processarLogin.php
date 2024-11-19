<?php
require_once __DIR__ . '/back-end/usuarioRepositorio.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $repository = new UsuarioRepositorio();

    try {
        // Obter usuário pelo e-mail
        $usuario = $repository->obterUsuarioPorEmail($email);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Login bem-sucedido
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            header("Location: dashboard.php");
            exit();
        } else {
            // Falha no login
            header("Location: login.php?status=erro&mensagem=" . urlencode("Email ou senha incorretos."));
            exit();
        }
    } catch (Exception $e) {
        header("Location: login.php?status=erro&mensagem=" . urlencode($e->getMessage()));
        exit();
    }
} else {
    header("Location: login.php");
    exit();
} 