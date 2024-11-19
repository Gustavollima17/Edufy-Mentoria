<?php
require_once '../back-end/usuario.php';
require_once '../back-end/usuario.php';
require_once '../banco/database.php'; // Arquivo onde está configurada sua conexão PDO


class CadastroService {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Método para salvar o usuário no banco de dados
    public function salvarUsuario(Usuario $usuario) {
        try {
            // Prepara o SQL para inserção
            $sql = "INSERT INTO usuarios (nome, telefone, cpf, email, senha, data_nascimento, nivel_formacao, instituicao_formacao, curso) 
                    VALUES (:nome, :telefone, :cpf, :email, :senha, :dataNascimento, :nivelFormacao, :instituicaoFormacao, :curso)";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome', $usuario->getNome());
            $stmt->bindParam(':telefone', $usuario->getTelefone());
            $stmt->bindParam(':cpf', $usuario->getCpf());
            $stmt->bindParam(':email', $usuario->getEmail());
            $stmt->bindParam(':senha', password_hash($usuario->getSenha(), PASSWORD_BCRYPT)); // Senha criptografada
            $stmt->bindParam(':dataNascimento', $usuario->getDataNascimento());
            $stmt->bindParam(':nivelFormacao', $usuario->getNivelFormacao());
            $stmt->bindParam(':instituicaoFormacao', $usuario->getInstituicaoFormacao());
            $stmt->bindParam(':curso', $usuario->getCurso());

            // Executa a inserção
            $stmt->execute();
            return true; // Retorna sucesso
        } catch (PDOException $e) {
            // Retorna erro se algo der errado
            return false;
        }
    }
}
?>
