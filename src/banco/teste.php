<?php
// Carregar configurações
$config = require 'config.php';

// Instanciar conexão
require 'database.php';
$db = new Database($config);
$pdo = $db->getPDO();

// Exemplo de criação de tabela (funciona tanto para SQLite quanto MySQL)
$pdo->exec("
    CREATE TABLE IF NOT EXISTS usuarios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        email TEXT NOT NULL UNIQUE,
        senha TEXT NOT NULL
    )
");

// Exemplo de inserção
$pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)")
    ->execute(['João Silva', 'joao@email.com', '1234']);

// Exemplo de consulta
$usuarios = $pdo->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario) {
    echo "ID: {$usuario['id']} - Nome: {$usuario['nome']} - Email: {$usuario['email']}<br>";
}
