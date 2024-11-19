<?php
class DatabaseConfig {
    private $driver;
    private $host;
    private $database;
    private $username;
    private $password;

    public function __construct($environment = 'development') {
        if ($environment === 'development') {
            $this->configureDevDatabase();
        } else {
            $this->configureProductionDatabase();
        }
    }

    private function configureDevDatabase() {
        $this->driver = 'sqlite';
        $this->database = __DIR__ . '/desenvolvimento.sqlite';
    }

    private function configureProductionDatabase() {
        $this->driver = 'mysql';
        $this->host = 'localhost';
        $this->database = 'nome_do_banco_producao';
        $this->username = 'usuario_producao';
        $this->password = 'senha_producao';
    }

    public function getConnection() {
        try {
            if ($this->driver === 'sqlite') {
                return new PDO("sqlite:{$this->database}");
            } else {
                return new PDO(
                    "mysql:host={$this->host};dbname={$this->database}", 
                    $this->username, 
                    $this->password
                );
            }
        } catch (PDOException $e) {
            throw new Exception("Erro de conexão: " . $e->getMessage());
        }
    }

    public function createTables() {
        $conn = $this->getConnection();
        
        if ($this->driver === 'sqlite') {
            CriacaoTabelas::criarTabelaSQLite($conn);
        } else {
            CriacaoTabelas::criarTabelaMySQL($conn);
        }
    }
}