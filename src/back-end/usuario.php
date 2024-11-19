<?php
require_once '../front-end/cadastro.php';
class Usuario {
    private $nome;
    private $telefone;
    private $cpf;
    private $email;
    private $senha;
    private $dataNascimento;
    private $nivelFormacao;
    private $instituicaoFormacao;
    private $curso;

    // Construtor
    public function __construct($nome, $telefone, $cpf, $email, $senha, $dataNascimento = null, $nivelFormacao = null, $instituicaoFormacao = null, $curso = null) {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->senha = $senha;
        $this->dataNascimento = $dataNascimento;
        $this->nivelFormacao = $nivelFormacao;
        $this->instituicaoFormacao = $instituicaoFormacao;
        $this->curso = $curso;
    }

    // Getters
    public function getNome() { return $this->nome; }
    public function getTelefone() { return $this->telefone; }
    public function getCpf() { return $this->cpf; }
    public function getEmail() { return $this->email; }
    public function getSenha() { return $this->senha; }
    public function getDataNascimento() { return $this->dataNascimento; }
    public function getNivelFormacao() { return $this->nivelFormacao; }
    public function getInstituicaoFormacao() { return $this->instituicaoFormacao; }
    public function getCurso() { return $this->curso; }

    // Setters
    public function setNome($nome) { $this->nome = $nome; }
    public function setTelefone($telefone) { $this->telefone = $telefone; }
    public function setCpf($cpf) { $this->cpf = $cpf; }
    public function setEmail($email) { $this->email = $email; }
    public function setSenha($senha) { $this->senha = $senha; }
    public function setDataNascimento($dataNascimento) { $this->dataNascimento = $dataNascimento; }
    public function setNivelFormacao($nivelFormacao) { $this->nivelFormacao = $nivelFormacao; }
    public function setInstituicaoFormacao($instituicaoFormacao) { $this->instituicaoFormacao = $instituicaoFormacao; }
    public function setCurso($curso) { $this->curso = $curso; }
}
?>
