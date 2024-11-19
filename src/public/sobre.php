<?php
// sobre.php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós - Nexus de Mentoria</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/sobre.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?> <!-- Inclui o cabeçalho -->

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

    <section class="impact">
        <div class="container">
            <h2>Nosso <span class="highlight">impacto</span></h2>
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
    </section>

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

    <?php include 'footer.php'; ?> <!-- Inclui o rodapé -->
</body>
</html>
