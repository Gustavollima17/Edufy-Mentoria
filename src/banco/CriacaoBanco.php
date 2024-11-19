<?php
class CriacaoBancoSQLite {
    private $caminhoBanco;

    public function __construct($caminhoBanco = null) {
        // Se não definir, usa caminho padrão
        $this->caminhoBanco = $caminhoBanco ?? __DIR__ . '/desenvolvimento.sqlite';
    }

    public function criarBancoDados() {
        // Verifica se o diretório existe
        $diretorio = dirname($this->caminhoBanco);
        if (!file_exists($diretorio)) {
            mkdir($diretorio, 0777, true);
        }

        // Cria conexão com o banco
        $conexao = new PDO("sqlite:{$this->caminhoBanco}");
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Cria tabela de usuários
        $conexao->exec("
            CREATE TABLE IF NOT EXISTS usuarios (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nome TEXT,
                telefone TEXT,
                cpf TEXT UNIQUE,
                email TEXT UNIQUE,
                senha TEXT,
                data_nascimento DATE
            )
        ");

        // Cria tabela de instrutores
        $conexao->exec("
            CREATE TABLE IF NOT EXISTS instrutores (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                usuario_id INTEGER,
                nivel_formacao TEXT,
                instituicao_formacao TEXT,
                curso TEXT,
                FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
            )
        ");

        echo "Banco de dados SQLite criado com sucesso!";
        return $conexao;
    }

    public function executar() {
        try {
            return $this->criarBancoDados();
        } catch (Exception $e) {
            echo "Erro ao criar banco de dados: " . $e->getMessage();
            return null;
        }
    }
}

// Executar a criação do banco
$criador = new CriacaoBancoSQLite();
$criador->executar();