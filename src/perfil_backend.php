<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php?erro=1");
    exit();
}

require_once __DIR__ . '/config/database.php';

try {
    $database = new Database();
    $pdo = $database->getConnection();

    $usuarioId = $_SESSION['usuario_id'];

    // Query para obter dados básicos do usuário
    $query = "
        SELECT 
            u.nome, u.dataNascimento, u.cpf, u.telefone, u.cidade, u.estado, 
            f.nivelFormacao, f.curso, 
            CASE WHEN f.usuario_id IS NOT NULL THEN 'tutor' ELSE 'aluno' END AS tipo
        FROM usuario u
        LEFT JOIN formacao f ON u.id = f.usuario_id
        WHERE u.id = ?
    ";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$usuarioId]);

    if ($stmt->rowCount() === 0) {
        throw new Exception("Usuário não encontrado.");
    }

    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    // Prepara os dados para exibição no frontend
    $user = [
        'name' => htmlspecialchars($userData['nome'], ENT_QUOTES, 'UTF-8'),
        'birth' => htmlspecialchars($userData['dataNascimento'], ENT_QUOTES, 'UTF-8'),
        'cpf' => htmlspecialchars($userData['cpf'], ENT_QUOTES, 'UTF-8'),
        'phone' => htmlspecialchars($userData['telefone'], ENT_QUOTES, 'UTF-8'),
        'city' => htmlspecialchars($userData['cidade'], ENT_QUOTES, 'UTF-8') . ' - ' . htmlspecialchars($userData['estado'], ENT_QUOTES, 'UTF-8'),
        'education' => htmlspecialchars($userData['nivelFormacao'] ?? 'Nenhum', ENT_QUOTES, 'UTF-8'),
        'course' => htmlspecialchars($userData['curso'] ?? 'Nenhum', ENT_QUOTES, 'UTF-8'),
        'type' => $userData['tipo'] // "tutor" ou "aluno"
    ];
    
} catch (Exception $e) {
    $_SESSION['erro'] = "Erro ao carregar o perfil: " . $e->getMessage();
    header("Location: login.php");
    exit();
}
