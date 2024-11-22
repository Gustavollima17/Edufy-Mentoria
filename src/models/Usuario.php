<?php
class Usuario {
    private $conn;
    private $table_name = "usuario";

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $is_tutor;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function login($email, $senha) {
        try {
            $query = "SELECT u.*, CASE WHEN f.usuario_id IS NOT NULL THEN 1 ELSE 0 END as is_tutor 
                     FROM " . $this->table_name . " u 
                     LEFT JOIN formacao f ON u.id = f.usuario_id 
                     WHERE u.email = ?";

            $stmt = $this->conn->prepare($query);
            $stmt->execute([$email]);

            if($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if(password_verify($senha, $row['senha'])) {
                    $this->id = $row['id'];
                    $this->nome = $row['nome'];
                    $this->email = $row['email'];
                    $this->is_tutor = $row['is_tutor'];
                    return true;
                }
            }
            return false;
        } catch(PDOException $e) {
            return false;
        }
    }
}
