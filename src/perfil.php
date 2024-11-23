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
        <?php include 'header.php'; ?>
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
                <h1 id="user-name">Nome do Usuário</h1>
                <p><strong>Data de nascimento:</strong> <span id="user-birth">01/01/2000</span></p>
                <p><strong>CPF:</strong> <span id="user-cpf">000.000.000-00</span></p>
                <p><strong>Nível de formação:</strong> <span id="user-education">Ensino Médio</span></p>
                <p><strong>Curso de formação:</strong> <span id="user-course">Nenhum</span></p>
                <p><strong>Telefone:</strong> <span id="user-phone">(00) 00000-0000</span></p>
                <p><strong>Cidade:</strong> <span id="user-city">Cidade - Estado</span></p>
                <p><strong>Eixo de ensino:</strong> <span id="user-area">Nenhum</span></p>
            </article>
        </section>

        <!-- Botão de Deslogar -->
        <section class="logout-container">
            <button class="logout-btn" id="logout-btn">Deslogar da conta</button>
        </section>

        <!-- Estatísticas -->
        <section class="perfil-estatisticas">
            <article class="stat">
                <h2>Tutor desde</h2>
                <p id="tutor-since">2023</p>
            </article>
            <article class="stat">
                <h2>Aulas ministradas</h2>
                <p id="lessons-taught">0</p>
            </article>
        </section>
    </main>

    <!-- Rodapé global -->
    <footer>
        <?php include 'footer.php'; ?>
    </footer>

    <!-- JavaScript -->
    <script>
        // Simulação de dados
        const userData = {
            name: "José Fernando Moreira",
            birth: "03/02/1989",
            cpf: "123.456.789-54",
            education: "Mestrado",
            course: "Matemática",
            phone: "(98) 98966-6207",
            city: "Chapadinha - Maranhão",
            area: "Enem e vestibulares",
            tutorSince: "2023",
            lessonsTaught: 2455
        };

        // Preenchendo os dados no perfil
        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById("user-name").textContent = userData.name;
            document.getElementById("user-birth").textContent = userData.birth;
            document.getElementById("user-cpf").textContent = userData.cpf;
            document.getElementById("user-education").textContent = userData.education;
            document.getElementById("user-course").textContent = userData.course;
            document.getElementById("user-phone").textContent = userData.phone;
            document.getElementById("user-city").textContent = userData.city;
            document.getElementById("user-area").textContent = userData.area;
            document.getElementById("tutor-since").textContent = userData.tutorSince;
            document.getElementById("lessons-taught").textContent = userData.lessonsTaught;
        });

        // Função para deslogar
        document.getElementById("logout-btn").addEventListener("click", () => {
            alert("Você foi deslogado.");
            // Redirecionar para a página de login
            window.location.href = "login.php";
        });
    </script>
</body>
</html>
