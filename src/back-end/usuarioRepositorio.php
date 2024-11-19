<?php
require_once __DIR__ . '/../banco/databaseConfig.php';
require_once 'usuario.php';
require_once 'instrutor.php';

class UsuarioRepositorio {
    private $conexao;

    public function __construct($ambiente = 'development') {
        $dbConfig = new DatabaseConfig($ambiente);
        $this->conexao = $dbConfig->getConnection();
    }

    public function inserirUsuario(array $dadosUsuario) {
        $sql = "INSERT INTO usuarios (nome, telefone, cpf, email, senha, data_nascimento) 
                VALUES (:nome, :telefone, :cpf, :email, :senha, :data_nascimento)";
        
        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(':nome', $dadosUsuario['nome']);
        $stmt->bindValue(':telefone', $dadosUsuario['telefone']);
        $stmt->bindValue(':cpf', $dadosUsuario['cpf']);
        $stmt->bindValue(':email', $dadosUsuario['email']);
        $stmt->bindValue(':senha', password_hash($dadosUsuario['senha'], PASSWORD_DEFAULT));
        $stmt->bindValue(':data_nascimento', $dadosUsuario['data_nascimento']);
        
        $stmt->execute();
        return $this->conexao->lastInsertId();
    }

    public function inserirInstrutor(array $dadosInstrutor) {
        // Primeiro, inserir usuário
        $usuarioId = $this->inserirUsuario($dadosInstrutor);
        
        $sql = "INSERT INTO instrutores (usuario_id, nivel_formacao, instituicao_formacao, curso) 
                VALUES (:usuario_id, :nivel_formacao, :instituicao_formacao, :curso)";
        
        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(':usuario_id', $usuarioId);
        $stmt->bindValue(':nivel_formacao', $dadosInstrutor['nivel_formacao']);
        $stmt->bindValue(':instituicao_formacao', $dadosInstrutor['instituicao_formacao']);
        $stmt->bindValue(':curso', $dadosInstrutor['curso']);
        
        $stmt->execute();
        return $this->conexao->lastInsertId();
    }
}

// Processamento do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $repository = new UsuarioRepositorio();
    
    try {
        if (isset($_POST['tipo_cadastro']) && $_POST['tipo_cadastro'] === 'instrutor') {
            // Cadastro de instrutor
            $repository->inserirInstrutor($_POST);
        } else {
            // Cadastro de usuário comum
            $repository->inserirUsuario($_POST);
        }
        
        // Redireciona com mensagem de sucesso
        header("Location: cadastro.php?status=sucesso");
        exit();
    } catch (Exception $e) {
        // Redireciona com mensagem de erro
        header("Location: cadastro.php?status=erro&mensagem=" . urlencode($e->getMessage()));
        exit();
    }
}