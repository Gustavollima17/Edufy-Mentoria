<?php
// Conexão com o banco de dados MySQL
$servername = "localhost";
$username = "seu_usuario";
$password = "";
$dbname = "formulario";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $tipoConta = $_POST['tipoConta'];
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $nivelFormacao = isset($_POST['nivelFormacao']) ? $_POST['nivelFormacao'] : null;
    $instituicaoFormacao = isset($_POST['instituicaoFormacao']) ? $_POST['instituicaoFormacao'] : null;
    $curso = isset($_POST['curso']) ? $_POST['curso'] : null;
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha para segurança

    // Preparar e executar a consulta de inserção
    $stmt = $conn->prepare("INSERT INTO usuarios (tipoConta, nome, dataNascimento, email, telefone, cpf, nivelFormacao, instituicaoFormacao, curso, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $tipoConta, $nome, $dataNascimento, $email, $telefone, $cpf, $nivelFormacao, $instituicaoFormacao, $curso, $senha);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
