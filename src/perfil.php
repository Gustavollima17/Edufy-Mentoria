

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/perfil.css">
</head>
<body>
    <!-- Cabeçalho global -->
    <header>
        <?php include 'header.php'; 
        require_once __DIR__. "/perfil_backend.php"
        ?>
    </header>

    <!-- Conteúdo principal -->
    <main class="perfil-container">
        <!-- Perfil do Usuário -->
        <section class="perfil-card">
            <figure class="perfil-imagem">
                <!-- Imagem estática -->
                <img id="user-image" src="https://cdn-icons-png.freepik.com/512/7816/7816987.png?ga=GA1.1.1066673407.1729179332" alt="Foto do usuário">
            </figure>
            <article class="perfil-dados">
                <h1 id="user-name"><?= $user['name']; ?></h1>
                <p><strong>Data de nascimento:</strong> <?= $user['birth']; ?></p>
                <p><strong>CPF:</strong> <?= $user['cpf']; ?></p>
                <?php if ($user['type'] === 'tutor'): ?>
                    <p><strong>Nível de formação:</strong> <?= $user['education']; ?></p>
                    <p><strong>Curso de formação:</strong> <?= $user['course']; ?></p>
                <?php endif; ?>
                <p><strong>Telefone:</strong> <?= $user['phone']; ?></p>
                <p><strong>Cidade:</strong> <?= $user['city']; ?></p>
            </article>
        </section>

        <!-- Botão de Deslogar -->
        <section class="logout-container">
            <form action="logout.php" method="POST">
                <button type="submit" class="logout-btn" id="logout-btn">Deslogar da conta</button>
            </form>
        </section>
    </main>

    <!-- Rodapé global -->
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
