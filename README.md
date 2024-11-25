

# Edufy-Mentoria

## 📋 Sobre  
O **Edufy-Mentoria** é uma plataforma de mentoria que conecta estudantes a mentores experientes, oferecendo ferramentas para facilitar o aprendizado e o acompanhamento do progresso.

## 🚀 Funcionalidades  
- Correspondência entre mentores e estudantes.  
- Sistema de agendamento.  
- Integração com videoconferência.  
- Rastreamento de progresso.  
- Compartilhamento de recursos.  

## 🛠️ Tecnologias  
- **Frontend**: JavaScript, CSS, HTML.  
- **Backend**: PHP.  
- **Banco de Dados**: MySQL.  

## ⚙️ Instalação  

### Pré-requisitos  
- Servidor Web (como Apache ou Nginx).  
- PHP 8.3 ou superior.  
- MySQL 8.0 ou superior.  
- Navegador moderno para acessar o frontend.  

### Passos  

1. Clone o repositório:  
   ```bash  
   git clone https://github.com/seuusuario/edufy-mentoria.git  
   ```  

2. Configure o servidor:  
   - Copie os arquivos do backend para o diretório raiz do seu servidor web.  
   - Configure o arquivo `config.php` com suas credenciais do banco de dados:  
     ```php  
     <?php  
     define('DB_HOST', 'localhost');  
     define('DB_USER', 'seu_usuario');  
     define('DB_PASS', 'sua_senha');  
     define('DB_NAME', 'edufy_mentoria');  
     ?>  
     ```  

3. Configure o banco de dados:  
   - Importe o arquivo SQL do projeto para criar as tabelas necessárias:  
     ```bash  
     mysql -u seu_usuario -p edufy_mentoria < database/estrutura.sql  
     ```  

4. Abra o frontend no navegador:  
   - Certifique-se de que o backend esteja rodando.  
   - Navegue até o diretório do frontend e abra o arquivo `index.html`.  

5. Teste a aplicação:  
   - Acesse o endereço do seu servidor (por exemplo, `http://localhost`).  
   - Verifique se o frontend e backend estão conectados corretamente.  

## 📝 Como Contribuir  
1. Faça um fork do repositório.  
2. Crie um branch para suas alterações:  
   ```bash  
   git checkout -b minha-nova-feature  
   ```  
3. Commit suas alterações:  
   ```bash  
   git commit -m "Adiciona nova funcionalidade"  
   ```  
4. Envie seu branch:  
   ```bash  
   git push origin minha-nova-feature  
   ```  


Se precisar de ajustes ou mais informações, é só avisar! 😊
