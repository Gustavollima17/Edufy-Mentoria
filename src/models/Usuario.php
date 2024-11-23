<?php
class Usuario {
    private $conn;
    private $table_name = "usuario";

    private $id;
    private $nome;
    private $email;
    private $is_tutor;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Métodos Getters
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getIsTutor() {
        return $this->is_tutor;
    }

    // Método para login
    public function login(string $email, string $senha): array {
        try {
            // Valida o formato do email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Formato de email inválido.");
            }

            // Prepara a query
            $query = "
                SELECT u.*, 
                       CASE WHEN f.usuario_id IS NOT NULL THEN 1 ELSE 0 END as is_tutor 
                FROM " . $this->table_name . " u
                LEFT JOIN formacao f ON u.id = f.usuario_id
                WHERE u.email = ?
            ";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$email]);

            // Verifica se o usuário existe
            if ($stmt->rowCount() === 0) {
                throw new Exception("Usuário não encontrado.");
            }

            // Obtém os dados do usuário
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica a senha
            if (!password_verify($senha, $row['senha'])) {
                throw new Exception("Senha inválida.");
            }

            // Popula os atributos da classe
            $this->id = $row['id'];
            $this->nome = $row['nome'];
            $this->email = $row['email'];
            $this->is_tutor = (bool)$row['is_tutor'];

            return [
                'status' => true,
                'message' => "Login realizado com sucesso.",
                'data' => [
                    'id' => $this->id,
                    'nome' => $this->nome,
                    'email' => $this->email,
                    'is_tutor' => $this->is_tutor
                ]
            ];
        } catch (Exception $e) {
            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
