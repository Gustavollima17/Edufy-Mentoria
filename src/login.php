<?php
session_start();

if(isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
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

    <main class="login-main" style="background: url('https://www.pucpr.br/wp-content/uploads/pucpr/2022/08/foto-buddy-1024x684.jpg') no-repeat center center/cover;">
        <div class="login-container">
            <h1>Login</h1>
            <?php
            if(isset($_GET['erro'])) {
                echo '<div class="alert alert-danger">Email ou senha incorretos!</div>';
            }
            if(isset($_GET['logout'])) {
                echo '<div class="alert alert-success">Logout realizado com sucesso!</div>';
            }
            ?>
            <form action="processa_login.php" method="POST" onsubmit="return validarFormulario()">
                <div class="input-group">
                    <label for="email">E-mail:</label>
                    <input type="text" id="email" name="email" required>
                </div>
    
                <div class="input-group">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
    
                <div class="options">
                    <a href="recuperar_senha.php">Esqueceu sua senha?</a>
                    <div class="checkbox">
                        <input type="checkbox" id="keep-logged" name="keep-logged">
                        <label for="keep-logged">Manter-se logado</label>
                    </div>
                </div>
    
                <button type="submit" class="btn-primary">Entrar</button>
            </form>
            <p class="signup-link">Ainda não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
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
                alert("Por favor, insira um email válido.");
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