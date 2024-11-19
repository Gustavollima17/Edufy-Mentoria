<?php

class CriacaoTabelas {
    public static function criarTabelaSQLite(PDO $conexao) {
        $conexao->exec("
            CREATE TABLE IF NOT EXISTS usuarios (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nome TEXT,
                telefone TEXT,
                cpf TEXT,
                email TEXT,
                senha TEXT,
                data_nascimento DATE
            )
        ");

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
    }

    public static function criarTabelaMySQL(PDO $conexao) {
        $conexao->exec("
            CREATE TABLE IF NOT EXISTS usuarios (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR(255),
                telefone VARCHAR(20),
                cpf VARCHAR(14),
                email VARCHAR(255),
                senha VARCHAR(255),
                data_nascimento DATE
            )
        ");

        $conexao->exec("
            CREATE TABLE IF NOT EXISTS instrutores (
                id INT AUTO_INCREMENT PRIMARY KEY,
                usuario_id INT,
                nivel_formacao VARCHAR(100),
                instituicao_formacao VARCHAR(255),
                curso VARCHAR(255),
                FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
            )
        ");
    }
}