<?php
// processar_cadastro.php
require_once __DIR__ . '/back-end/usuarioRepositorio.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $repository = new UsuarioRepositorio();
    
    try {
        if (isset($_POST['tipo_cadastro']) && $_POST['tipo_cadastro'] === 'instrutor') {
            // Cadastro de instrutor
            $repository->inserirInstrutor($_POST);
            $mensagem = "Instrutor cadastrado com sucesso!";
        } else {
            // Cadastro de usuário comum
            $repository->inserirUsuario($_POST);
            $mensagem = "Usuário cadastrado com sucesso!";
        }
        
        // Redireciona com mensagem de sucesso
        header("Location: cadastro.html?status=sucesso&mensagem=" . urlencode($mensagem));
        exit();
    } catch (Exception $e) {
        // Redireciona com mensagem de erro
        header("Location: cadastro.html?status=erro&mensagem=" . urlencode($e->getMessage()));
        exit();
    }
} else {
    // Se tentar acessar diretamente sem submeter o formulário
    header("Location: cadastro.html");
    exit();
}