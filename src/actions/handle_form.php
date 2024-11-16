<?php
require_once '../config/database.php';
require_once '../includes/functions.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Receber os dados do formulário
    $tipoConta = $_POST['tipoConta'] ?? null;
    $nome = $_POST['nome'] ?? null;
    $dataNascimento = $_POST['dataNascimento'] ?? null;
    $email = $_POST['email'] ?? null;
    $telefone = $_POST['telefone'] ?? null;
    $cpf = $_POST['cpf'] ?? null;
    $nivelFormacao = $_POST['nivelFormacao'] ?? null;
    $instituicaoFormacao = $_POST['instituicaoFormacao'] ?? null;
    $curso = $_POST['curso'] ?? null;
    $senha = isset($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : null;

    // Validar os dados
    $erros = [];

    if (!$nome) $erros[] = "O campo nome é obrigatório.";
    if (!$email || !validarEmail($email)) $erros[] = "Email inválido.";
    if (!$cpf || !validarCPF($cpf)) $erros[] = "CPF inválido.";
    if (!$telefone || !validarTelefone($telefone)) $erros[] = "Telefone inválido.";

    if ($erros) {
        foreach ($erros as $erro) {
            echo $erro . "<br>";
        }
        return;
    }

    // Preparar e executar a consulta de inserção
    $stmt = $conn->prepare("INSERT INTO usuarios (tipoConta, nome, dataNascimento, email, telefone, cpf, nivelFormacao, instituicaoFormacao, curso, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $tipoConta, $nome, $dataNascimento, $email, $telefone, $cpf, $nivelFormacao, $instituicaoFormacao, $curso, $senha);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
