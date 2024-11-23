<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Nexus de Mentoria</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/cadastro.css">
</head>

<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <section class="cadastro-section">
        <div class="cadastro-container">
            <h2>Cadastre-se</h2>
            <p>Escolha o tipo de conta</p>
            <!-- Seleção do tipo de conta -->
            <div class="options-container">
                <div class="option">
                    <label for="aluno">
                        <img src="https://cdn-icons-png.flaticon.com/512/3413/3413591.png" alt="Aluno" class="form-image">
                        <br>Aluno
                        <input type="radio" name="tipoConta" id="aluno" onclick="toggleFields('aluno')" required>
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
            <p>Preencha os dados abaixo</p>

            <form id="cadastroForm" action="processa_cadastro.php" method="POST" onsubmit="return validateForm()">
                <input type="hidden" name="tipoConta" id="tipoContaHidden" value="">
                <!-- Campos comuns -->
                <input type="text" id="nome" name="nome" placeholder="Nome completo" required>
                <input type="date" id="dataNascimento" name="dataNascimento" placeholder="Data de nascimento" required>
                <input type="email" id="email" name="email" placeholder="E-mail" required>
                <div class="inline-inputs">
                    <input type="tel" id="telefone" name="telefone" placeholder="Telefone" required>
                    <input type="text" id="cpf" name="cpf" placeholder="CPF" required>
                </div>
                <div class="inline-inputs">
                    <input type="text" id="rua" name="rua" placeholder="Rua" required>
                    <input type="text" id="cep" name="cep" placeholder="CEP" required>
                </div>
                <div class="inline-inputs">
                    <select id="estado" name="estado" required>
                        <option value="" disabled selected>Estado</option>
                        <option value="AC">AC - Acre</option>
                        <option value="AL">AL - Alagoas</option>
                        <option value="AP">AP - Amapá</option>
                        <option value="AM">AM - Amazonas</option>
                        <option value="BA">BA - Bahia</option>
                        <option value="CE">CE - Ceará</option>
                        <option value="DF">DF - Distrito Federal</option>
                        <option value="ES">ES - Espírito Santo</option>
                        <option value="GO">GO - Goiás</option>
                        <option value="MA">MA - Maranhão</option>
                        <option value="MT">MT - Mato Grosso</option>
                        <option value="MS">MS - Mato Grosso do Sul</option>
                        <option value="MG">MG - Minas Gerais</option>
                        <option value="PA">PA - Pará</option>
                        <option value="PB">PB - Paraíba</option>
                        <option value="PR">PR - Paraná</option>
                        <option value="PE">PE - Pernambuco</option>
                        <option value="PI">PI - Piauí</option>
                        <option value="RJ">RJ - Rio de Janeiro</option>
                        <option value="RN">RN - Rio Grande do Norte</option>
                        <option value="RS">RS - Rio Grande do Sul</option>
                        <option value="RO">RO - Rondônia</option>
                        <option value="RR">RR - Roraima</option>
                        <option value="SC">SC - Santa Catarina</option>
                        <option value="SP">SP - São Paulo</option>
                        <option value="SE">SE - Sergipe</option>
                        <option value="TO">TO - Tocantins</option>
                    </select>
                    <input type="text" id="cidade" name="cidade" placeholder="Cidade" required>
                </div>

                <!-- Campos específicos do Tutor -->
                <input type="text" id="nivelFormacao" name="nivelFormacao" placeholder="Nível de formação" style="display: none;">
                <input type="text" id="instituicaoFormacao" name="instituicaoFormacao" placeholder="Instituição de formação" style="display: none;">
                <input type="text" id="curso" name="curso" placeholder="Curso" style="display: none;">

                <!-- Campos de senha -->
                <input type="password" id="senha" name="senha" placeholder="Senha" required>
                <input type="password" id="confirmaSenha" name="confirmaSenha" placeholder="Repita a senha" required>
                <div>
                    <input type="checkbox" id="termos" required> Concordo com os <a href="#">Termos de Uso</a>
                </div>
                <button type="submit" class="submit-btn">Cadastrar-se</button>
            </form>
        </div>
    </section>

        <!-- Rodapé global -->
    <footer>
    <?php include 'footer.php'; ?>
    </footer>

    <script>
        function toggleFields(tipoConta) {
            // Exibir ou ocultar campos específicos do Tutor
            document.getElementById("tipoContaHidden").value = tipoConta;

            const isTutor = tipoConta === 'tutor';
            document.getElementById("nivelFormacao").style.display = isTutor ? "block" : "none";
            document.getElementById("instituicaoFormacao").style.display = isTutor ? "block" : "none";
            document.getElementById("curso").style.display = isTutor ? "block" : "none";
        }

        function validateForm() {
            // Verificar se o tipo de conta foi selecionado
            const tipoContaAluno = document.getElementById("aluno").checked;
            const tipoContaTutor = document.getElementById("tutor").checked;

            if (!tipoContaAluno && !tipoContaTutor) {
                alert("Por favor, selecione um tipo de conta (Aluno ou Tutor).");
                return false;
            }

            // Verificar se as senhas coincidem
            const senha = document.getElementById("senha").value;
            const confirmaSenha = document.getElementById("confirmaSenha").value;

            if (senha !== confirmaSenha) {
                alert("As senhas não coincidem. Por favor, tente novamente.");
                return false;
            }
            console.log(tipoContaAluno)
            console.log(tipoContaTutor)
            return true;
        }

        // Exibir os campos padrão para "Aluno" ao carregar a página
        document.addEventListener("DOMContentLoaded", () => {
            toggleFields('aluno');
        });
    </script>
</body>

</html>