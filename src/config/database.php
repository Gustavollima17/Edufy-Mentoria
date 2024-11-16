<?php
// Configuração da conexão com o banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "";
$dbname = "formulario";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
