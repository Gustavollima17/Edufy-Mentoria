<?php
try {
    // Caminho do arquivo do banco SQLite
    $caminhoBanco = __DIR__ . '/banco.sqlite'; // Salva no mesmo diretório do script
    $db = new PDO("sqlite:$caminhoBanco");

    // Configurações de erro
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criação de tabelas
    $sql = "
    CREATE TABLE IF NOT EXISTS usuarios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        email TEXT NOT NULL UNIQUE,
        senha TEXT NOT NULL
    );

    CREATE TABLE IF NOT EXISTS produtos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        preco REAL NOT NULL,
        quantidade INTEGER NOT NULL
    );
    ";
    $db->exec($sql);

    echo "Banco de dados e tabelas criados com sucesso em: $caminhoBanco";
} catch (PDOException $e) {
    echo "Erro ao criar o banco de dados: " . $e->getMessage();
}