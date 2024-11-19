<?php
try {
    // Caminho para o arquivo SQLite (o banco de dados será criado no mesmo diretório)
    $db = new PDO('sqlite:usuarios.db');

    // Configurar o modo de erro do PDO para exceções
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL para criar a tabela 'usuarios'
    $sql = "
    CREATE TABLE IF NOT EXISTS usuarios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        telefone TEXT,
        cpf TEXT NOT NULL UNIQUE,
        email TEXT NOT NULL UNIQUE,
        senha TEXT NOT NULL,
        data_nascimento TEXT,
        nivel_formacao TEXT,
        instituicao_formacao TEXT,
        curso TEXT
    )";

    // Executar a consulta SQL
    $db->exec($sql);

    echo "Tabela 'usuarios' criada com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao criar tabela: " . $e->getMessage();
}
?>
