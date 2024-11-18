<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus de Mentoria</title>
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/home.css">



    <body>
        <header class="header">
            <div class="container">
                <div class="logo">
                    <img src="images/logoedufy.png" alt="Edufy de Mentoria">
                </div>
                <nav class="nav">
                    <ul>
                        <li><a href="./index.php" target="_blank" >Início</a></li>
                        <li><a href="./sobre.php" target="_blank">Sobre nós</a></li>
                        <li><a href="#">Mentorias</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contato</a></li>
                        <li><a href="./login.php" target="_blank" class="btn-login">Login</a></li>
                        <li><a href="/cadastro.php" target="_blank" class="cadastro-btn">Cadastre-se</a></li>
                    </ul>
                </nav>
            </div>
        </header>


        
        <section class="cadastro-section">
            <div class="cadastro-container">
              <h2>Cadastre-se</h2>
              <p>Escolha o tipo de conta</p>
          
              <div class="options-container">
                <div class="option">
                  <label for="aluno">
                    <img src="https://cdn-icons-png.flaticon.com/512/3413/3413591.png" alt="Aluno" class="form-image">
                    <br>Aluno
                    <input href="" type="radio" name="tipoConta" id="aluno" onclick="toggleFields('aluno')" required>
                  </label>
                </div>
          
                <div class="option">
                  <label for="tutor">
                    <img src="https://www.freeiconspng.com/thumbs/training-icon/leadership-training-icon-1.png" alt="Tutor" class="form-image">
                    <br>Tutor
                    <input type="radio" name="tipoConta" id="tutor" onclick="toggleFields('tutor')" required>
                  </label>
                </div>
              </div>
          
              <p>Preencha os dados a seguir</p>
          
              <form id="cadastroForm" action="processa_cadastro.php" method="POST" onsubmit="return validateForm()">
                <input type="text" id="nome" placeholder="Nome completo" required>
                <input type="date" id="dataNascimento" placeholder="Data de nascimento" required>
                <input type="email" id="email" placeholder="E-mail" required>
                <div class="inline-inputs">
                  <input type="tel" id="telefone" placeholder="Telefone" required>
                  <input type="text" id="cpf" placeholder="CPF" required>
                </div>
                <input type="text" id="nivelFormacao" placeholder="Nível de formação" style="display: none;">
                <input type="text" id="instituicaoFormacao" placeholder="Instituição de formação" style="display: none;">
                <input type="text" id="curso" placeholder="Curso" style="display: none;">
                <input type="password" id="senha" placeholder="Senha" required>
                <input type="password" id="confirmaSenha" placeholder="Repita a senha" required>
                <div>
                  <input type="checkbox" id="termos" required> Concordo com os <a href="#">Termos de Uso</a>
                </div>
                <button type="submit" class="submit-btn">Cadastrar-se</button>
              </form>
            </div>

              <article>
                <img id="imagemTipoConta" src="https://static.vecteezy.com/system/resources/thumbnails/024/724/632/small_2x/a-happy-smiling-young-college-student-with-a-book-in-hand-isolated-on-a-transparent-background-generative-ai-png.png" class="imagem-aluno" alt="estudante">
              </article>
          
          </section>


 
<br>

    <div class="kodfun-galeri">
        <div style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQctkarT8WI3QNMXuI9tJW-paDEDG62qFUFfQ&s');"></div>
        <div style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQctkarT8WI3QNMXuI9tJW-paDEDG62qFUFfQ&s');"></div>
        <div style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQctkarT8WI3QNMXuI9tJW-paDEDG62qFUFfQ&s');"></div>
        <div style="background-image: url('https://i.pinimg.com/originals/99/e9/6e/99e96ecb28c022a5e638af443e53efc7.jpg');"></div>
        <div style="background-image: url('https://img.freepik.com/free-photo/joyful-young-bald-call-center-man-holding-book-pointing-front-isolated-orange_141793-84024.jpg?t=st=1731431250~exp=1731434850~hmac=078792185c5877308f908bbcf6e6d275a05bf88efa9c3aebf5a5076688bbfa0e&w=826');"></div>
    </div>

<br>
    <footer>
        <div class="container">
            <p>&copy; 2024 SiriusProject. Todos os direitos reservados.</p>
            <nav>
                <ul>
                    <li><a href="./index.php">Início</a></li>
                    <li><a href="./sobre.html">Sobre nós</a></li>
                    <li><a href="#">Mentorias</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>

<br>

<script>
    function toggleFields(tipoConta) {
      
      document.getElementById("nome").style.display = "block";
      document.getElementById("dataNascimento").style.display = "block";
      document.getElementById("email").style.display = "block";
      document.getElementById("telefone").style.display = "block";
      document.getElementById("cpf").style.display = "block";
      document.getElementById("senha").style.display = "block";
      document.getElementById("confirmaSenha").style.display = "block";
  
      
      const isTutor = tipoConta === 'tutor';
      document.getElementById("nivelFormacao").style.display = isTutor ? "block" : "none";
      document.getElementById("instituicaoFormacao").style.display = isTutor ? "block" : "none";
      document.getElementById("curso").style.display = isTutor ? "block" : "none";
  
      
      const imagemTipoConta = document.getElementById("imagemTipoConta");
      if (isTutor) {
        imagemTipoConta.src = "https://parspng.com/wp-content/uploads/2023/10/teacherpng.parspng.com-2.png";
        imagemTipoConta.alt = "tutor";
        imagemTipoConta.style.width = "400px";
      } else {
        imagemTipoConta.src = "https://static.vecteezy.com/system/resources/thumbnails/024/724/632/small_2x/a-happy-smiling-young-college-student-with-a-book-in-hand-isolated-on-a-transparent-background-generative-ai-png.png";
        imagemTipoConta.alt = "estudante";
        imagemTipoConta.style.width = "780px";
      }
    }
  
    
    document.addEventListener("DOMContentLoaded", () => {
      toggleFields('aluno');
    });
  
    
    function validateForm() {
      const tipoContaAluno = document.getElementById("aluno").checked;
      const tipoContaTutor = document.getElementById("tutor").checked;
      
      if (!tipoContaAluno && !tipoContaTutor) {
        alert("Por favor, selecione uma opção de conta (Aluno ou Tutor).");
        return false;
      }
      
      const senha = document.getElementById("senha").value;
      const confirmaSenha = document.getElementById("confirmaSenha").value;
      
      if (senha !== confirmaSenha) {
        alert("As senhas não coincidem. Por favor, verifique.");
        return false;
      }
  
      return true;
    }
  </script>

</html>
