<?php

// Conectar ou criar novo banco SQLite
try {
    $db = new PDO('sqlite:database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Habilitar chaves estrangeiras
    $db->exec('PRAGMA foreign_keys = ON;');
    
    // Array com os comandos SQL para criar as tabelas
    $tables = [
        // Tabela CADASTRO
        "CREATE TABLE IF NOT EXISTS CADASTRO (
            id_cadastro INTEGER PRIMARY KEY,
            data_cadastro DATE,
            telefone VARCHAR(25),
            cpf VARCHAR(14),
            USUARIO_id_usuario INTEGER,
            FOREIGN KEY (USUARIO_id_usuario) REFERENCES USUARIO(id_usuario)
        )",
        
        // Tabela USUARIO
        "CREATE TABLE IF NOT EXISTS USUARIO (
            id_usuario INTEGER PRIMARY KEY,
            nome VARCHAR(100),
            telefone VARCHAR(20),
            email VARCHAR(100),
            cpf CHAR(14) UNIQUE,
            tipo ENUM,
            senha VARCHAR(255)
        )",
        
        // Tabela ALUNO
        "CREATE TABLE IF NOT EXISTS ALUNO (
            id_aluno INTEGER PRIMARY KEY,
            nome VARCHAR(100),
            data_nascimento DATE,
            email VARCHAR(100),
            telefone VARCHAR(20),
            cpf CHAR(14),
            senha VARCHAR(255),
            USUARIO_id_usuario INTEGER,
            FOREIGN KEY (USUARIO_id_usuario) REFERENCES USUARIO(id_usuario)
        )",
        
        // Tabela TUTOR
        "CREATE TABLE IF NOT EXISTS TUTOR (
            id_tutor INTEGER PRIMARY KEY,
            nome VARCHAR(100),
            data_nascimento DATE,
            email VARCHAR(100),
            telefone VARCHAR(20),
            cpf CHAR(14),
            nivel_formacao VARCHAR(100),
            instituo_formacao VARCHAR(150),
            senha VARCHAR(255),
            USUARIO_id_usuario INTEGER,
            FOREIGN KEY (USUARIO_id_usuario) REFERENCES USUARIO(id_usuario)
        )",
        
        // Tabela FORMACAO
        "CREATE TABLE IF NOT EXISTS FORMACAO (
            id_formacao INTEGER PRIMARY KEY,
            nivel_formacao VARCHAR(100),
            instituto_formacao VARCHAR(150),
            TUTOR_id_tutor INTEGER,
            FOREIGN KEY (TUTOR_id_tutor) REFERENCES TUTOR(id_tutor)
        )",
        
        // Tabela CURSO
        "CREATE TABLE IF NOT EXISTS CURSO (
            id_curso INTEGER PRIMARY KEY,
            nome VARCHAR(50),
            descricao TEXT,
            anexos JSON,
            TUTOR_id_tutor INTEGER,
            ALUNO_id_aluno INTEGER,
            FOREIGN KEY (TUTOR_id_tutor) REFERENCES TUTOR(id_tutor),
            FOREIGN KEY (ALUNO_id_aluno) REFERENCES ALUNO(id_aluno)
        )",
        
        // Tabela FEEDBACKS
        "CREATE TABLE IF NOT EXISTS FEEDBACKS (
            id_feedback INTEGER PRIMARY KEY,
            comentario TEXT,
            avaliacao INTEGER,
            data_feedback DATE,
            USUARIO_id_usuario INTEGER,
            FOREIGN KEY (USUARIO_id_usuario) REFERENCES USUARIO(id_usuario)
        )"
    ];
    
    // Executar cada comando SQL para criar as tabelas
    foreach ($tables as $sql) {
        $db->exec($sql);
    }
    
    echo "Banco de dados e tabelas criados com sucesso!\n";
    
} catch(PDOException $e) {
    echo "Erro ao criar banco de dados: " . $e->getMessage() . "\n";
}
?>