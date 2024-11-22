<?php
require_once __DIR__ . '/config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pdo->beginTransaction();
        
        // Inserção na tabela usuario
        $stmt = $pdo->prepare("INSERT INTO usuario (nome, dataNascimento, email, telefone, cpf, rua, cep, estado, cidade, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        
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
        
        $usuario_id = $pdo->lastInsertId();
        
        if ($_POST['tipoConta'] === 'tutor') {
            $stmt = $pdo->prepare("INSERT INTO formacao (usuario_id, nivelFormacao, instituicaoFormacao, curso) VALUES (?, ?, ?, ?)");
            
            $stmt->execute([
                $usuario_id,
                $_POST['nivelFormacao'],
                $_POST['instituicaoFormacao'],
                $_POST['curso']
            ]);
        }
        
        $pdo->commit();
        
        $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
        header("Location: login.php");
        exit();
        
    } catch (PDOException $e) {
        $pdo->rollBack();
        $_SESSION['erro'] = "Erro ao cadastrar: " . $e->getMessage();
        header("Location: cadastro.php");
        exit();
    }
}
