<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/perfil.css">
</head>
 <li><a href="#">Blog</a></li>
                    <li><a href="#">Contato</a></li>
                </ul><body>
    <!-- Cabeçalho global -->
    <?php include 'header.php'; ?>

    <!-- Conteúdo principal -->
    <main class="perfil-container">
        <!-- Card do usuário -->
        <section class="perfil-card">
            <div class="perfil-imagem">
                <img id="user-image" src="https://via.placeholder.com/150" alt="Foto do usuário">
            </div>
            <div class="perfil-dados">
                <h1 id="user-name">Nome do Usuário</h1>
                <p><strong>Data de nascimento:</strong> <span id="user-birth">01/01/2000</span></p>
                <p><strong>CPF:</strong> <span id="user-cpf">000.000.000-00</span></p>
                <p><strong>Nível de formação:</strong> <span id="user-education">Ensino Médio</span></p>
                <p><strong>Curso de formação:</strong> <span id="user-course">Nenhum</span></p>
                <p><strong>Telefone:</strong> <span id="user-phone">(00) 00000-0000</span></p>
                <p><strong>Cidade:</strong> <span id="user-city">Cidade - Estado</span></p>
                <p><strong>Eixo de ensino:</strong> <span id="user-area">Nenhum</span></p>
            </div>
        </section>

        <!-- Estatísticas -->
        <section class="perfil-estatisticas">
            <div class="stat">
                <h2>Tutor desde</h2>
                <p id="tutor-since">2023</p>
            </div>
            <div class="stat">
                <h2>Aulas ministradas</h2>
                <p id="lessons-taught">0</p>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>© 2024 SiriusProject. Todos os direitos reservados.</p>
            <p><a href="#">Política de Privacidade</a> | <a href="#">Termos de Uso</a></p>
        </div>
    </footer>
    

    <!-- JavaScript para preencher os dados -->
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
            lessonsTaught: 2455,
            picture: "https://via.placeholder.com/150"
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
            document.getElementById("user-image").src = userData.picture;
        });
    </script>

    <?php include 'footer.php'; ?>
</body>
</html>