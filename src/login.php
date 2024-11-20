<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Nexus de Monitoria</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>

<<<<<<< HEAD
    <body>
        <main class="login-main" style="background: url('https://www.pucpr.br/wp-content/uploads/pucpr/2022/08/foto-buddy-1024x684.jpg') no-repeat center center/cover;">
            <div class="login-container">
                <h1>Login</h1>
                <form action="processarLogin.php" method="POST" onsubmit="return validarFormulario()">
                    <div class="input-group">
                        <label for="email">E-mail:</label>
                        <input type="text" id="email" name="email" required>
                    </div>
        
                    <div class="input-group">
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" required>
                    </div>
        
                    <div class="options">
                        <a href="#">Esqueceu sua senha?</a>
                        <div class="checkbox">
                            <input type="checkbox" id="keep-logged" name="keep-logged">
                            <label for="keep-logged">Manter-se logado</label>
                        </div>
                    </div>
        
                    <button type="submit" class="btn-primary">Entrar</button>
                </form>
                <p class="signup-link">Ainda não tem conta? <a href="#">Cadastre-se</a></p>
            </div>
        </main>
        
<br>
        <footer class="footer">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-links">
                        <a href="#">App</a>
                        <a href="#">Comunidade</a>
                        <a href="#">Contribua</a>
=======
    <main class="login-main" style="background: url('https://www.pucpr.br/wp-content/uploads/pucpr/2022/08/foto-buddy-1024x684.jpg') no-repeat center center/cover;">
        <div class="login-container">
            <h1>Login</h1>
            <form onsubmit="return validarFormulario()">
                <div class="input-group">
                    <label for="email">E-mail:</label>
                    <input type="text" id="email" name="email" required>
                </div>
    
                <div class="input-group">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
    
                <div class="options">
                    <a href="#">Esqueceu sua senha?</a>
                    <div class="checkbox">
                        <input type="checkbox" id="keep-logged" name="keep-logged">
                        <label for="keep-logged">Manter-se logado</label>
>>>>>>> f1581685e60b3243e772365475e73fd3a41e590f
                    </div>
                </div>
    
                <button type="submit" class="btn-primary">Entrar</button>
            </form>
            <p class="signup-link">Ainda não tem conta? <a href="#">Cadastre-se</a></p>
        </div>
    </main>

    <?php include 'footer.php'; ?>

<script>
    function validarFormulario() {
        const email = document.getElementById("email").value;
        const senha = document.getElementById("senha").value;

        const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email === "") {
            alert("Por favor, preencha o campo de e-mail.");
            return false;
        } else if (!regexEmail.test(email)) {
            alert("Email ou senha incorretos!!!");
            return false;
        }

        if (senha === "") {
            alert("Por favor, preencha o campo de senha.");
            return false;
        }

        return true;
    }
</script>
</body>
</html>
