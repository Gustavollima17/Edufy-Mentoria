<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós - Nexus de Mentoria</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/sobre.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <section class="banner-home" style="background: url('https://www.unimestre.com/wp-content/uploads/2019/10/estudante_computador_portal-1024x682.jpg') no-repeat center center/cover;">
        <div class="container">
            <div class="banner-home-text">
                <h1>Junte-se a nós!</h1>
                <p style="color: #000000;">Junte-se à nossa comunidade de mentorias para ajudar os jovens a alcançarem seu máximo potencial.</p>
                <div class="form-background">
                    <form class="banner-home-form">
                        <input type="text" placeholder="Nome completo" required>
                        <input type="email" placeholder="Email" required>
                        <input type="tel" placeholder="Telefone" required>
                        <button type="submit" class="btn">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="mission">
        <div class="container">
            <div class="mission-content">
                <div class="mission-text">
                    <h2>Nossa <span class="highlight">missão</span></h2>
                    <p>O SiriusProject, através do Edufy de Mentoria, tem como propósito empoderar jovens de diferentes origens a atingir seu potencial máximo. Oferecemos mentorias gratuitas e personalizadas que ajudam os jovens a adquirir habilidades técnicas e profissionais, proporcionando um caminho para o sucesso independentemente da origem socioeconômica.</p>
                </div>
                <div class="mission-image">
                    <img src="https://lirp.cdn-website.com/e9d501ba/dms3rep/multi/opt/Qual+a+diferen%C3%A7a+entre+curso+T%C3%A9cnico+e+a+faculdade-1920w.jpg" alt="Missão">
                </div>
            </div>
        </div>
    </section>
<br>
    <section class="impact">
        <div class="container">
            <h2>Nosso <span class="highlight">Impacto</span></h2>

            <!-- Botões para alternar entre tabela e gráficos -->
            <div class="impact-toggle">
                <button id="toggle-table" class="toggle-btn active">Tabela</button>
                <button id="toggle-graph" class="toggle-btn">Gráficos</button>
            </div>

            <!-- Conteúdo da tabela -->
            <div id="table-section">
                <div class="impact-stats">
                    <div class="stat">
                        <h3>2,000+</h3>
                        <p class="stat-description">+300%<br>Jovens apoiados</p>
                    </div>
                    <div class="stat">
                        <h3>1,500+</h3>
                        <p class="stat-description">+350%<br>Mentores especializados</p>
                    </div>
                    <div class="stat">
                        <h3>6,500+</h3>
                        <p class="stat-description">+250%<br>Horas de mentoria</p>
                    </div>
                </div>
            </div>

            <!-- Conteúdo dos gráficos -->
            <div id="graph-section" style="display: none;">
                <div style="display: flex; justify-content: space-around; align-items: flex-start; gap: 20px; flex-wrap: wrap;">
                    <!-- Gráfico de Idade Média -->
                    <div>
                        <h3 style="text-align: center; margin-bottom: 20px;">Idade média de usuários do site</h3>
                        <canvas id="impact-chart-age"></canvas>
                    </div>
                    <!-- Gráfico de Regiões Beneficiadas -->
                    <div>
                        <h3 style="text-align: center; margin-bottom: 20px;">Regiões mais beneficiadas</h3>
                        <canvas id="impact-chart-regions"></canvas>
                    </div>
                    <!-- Gráfico de Nível de Escolaridade -->
                    <div>
                        <h3 style="text-align: center; margin-bottom: 20px;">Nível de Escolaridade</h3>
                        <canvas id="impact-chart-education"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <br>

    <section class="testimonials">
        <div class="container">
            <h2>Depoimentos de nossos <span class="highlight">mentorados</span></h2>
            <div class="testimonials-container">
                <div class="testimonial">

                    <div class="testimonial-header">
                        <p class="testimonial-name">Gustavo Lima</p>
                        <p class="testimonial-date">15 de janeiro de 2024</p>
                    </div>

                    <p class="testimonial-rating">⭐⭐⭐⭐⭐</p>
                    <p class="testimonial-text">
                        O SiriusProject me conectou com um mentor que realmente entendeu minhas necessidades e me ajudou a evoluir na minha carreira. Foi uma experiência incrível e transformadora!
                    </p>

                </div>
                <div class="testimonial">
                    <div class="testimonial-header">
                        <p class="testimonial-name">Felipe Ferreira</p>
                        <p class="testimonial-date">5 de dezembro de 2023</p>

                    </div>
                    <p class="testimonial-rating">⭐⭐⭐⭐⭐</p>
                    <p class="testimonial-text">
                        A mentoria que recebi foi essencial para meu desenvolvimento profissional. Eu aprendi e desenvolvi habilidades que foram super úteis no mercado de tecnologia. Super recomendo!
                    </p>

                </div>
                <div class="testimonial">
                    <div class="testimonial-header">
                        <p class="testimonial-name">Bruno de Souza</p>
                        <p class="testimonial-date">28 de novembro de 2023</p>
                    </div>


                    <p class="testimonial-rating">⭐⭐⭐⭐⭐</p>
                    <p class="testimonial-text">
                        A experiência de mentor foi além do que eu esperava. Meu mentor foi guiado, se preocupou com meu desenvolvimento e me ajudou a entender mais. Muito obrigado pela conexão e a estrutura que têm no SiriusProject!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Rodapé global -->
    <footer>
        <?php include 'footer.php'; ?>
    </footer>

    <script>
        const tableSection = document.getElementById('table-section');
        const graphSection = document.getElementById('graph-section');
        const toggleTableButton = document.getElementById('toggle-table');
        const toggleGraphButton = document.getElementById('toggle-graph');
        let chartsInitialized = false;

        // Alternar entre tabela e gráficos
        toggleTableButton.addEventListener('click', () => {
            tableSection.style.display = 'block';
            graphSection.style.display = 'none';
            toggleTableButton.classList.add('active');
            toggleGraphButton.classList.remove('active');
        });

        toggleGraphButton.addEventListener('click', () => {
            graphSection.style.display = 'block';
            tableSection.style.display = 'none';
            toggleGraphButton.classList.add('active');
            toggleTableButton.classList.remove('active');

            if (!chartsInitialized) {
                initializeCharts();
                chartsInitialized = true;
            }
        });

        // Inicializar os gráficos
        function initializeCharts() {
            const ctxAge = document.getElementById('impact-chart-age').getContext('2d');
            const ctxRegions = document.getElementById('impact-chart-regions').getContext('2d');
            const ctxEducation = document.getElementById('impact-chart-education').getContext('2d');

            // Gráfico de Idade Média
            new Chart(ctxAge, {
                type: 'doughnut',
                data: {
                    labels: ['18-25 anos', '26-35 anos', '36-45 anos', '46+ anos'],
                    datasets: [{
                        data: [45, 30, 15, 10],
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'bottom' }
                    }
                }
            });

            // Gráfico de Regiões Beneficiadas
            new Chart(ctxRegions, {
                type: 'doughnut',
                data: {
                    labels: ['Norte', 'Nordeste', 'Centro-Oeste', 'Sudeste', 'Sul'],
                    datasets: [{
                        data: [15, 25, 20, 30, 10],
                        backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'bottom' }
                    }
                }
            });

            // Gráfico de Nível de Escolaridade
            new Chart(ctxEducation, {
                type: 'doughnut',
                data: {
                    labels: ['Ensino Fundamental', 'Ensino Médio', 'Ensino Superior'],
                    datasets: [{
                        data: [20, 50, 30],
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'bottom' }
                    }
                }
            });
        }
    </script>
</body>
</html>
