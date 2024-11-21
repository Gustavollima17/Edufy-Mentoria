<?php
require_once 'usuario.php'; // Certifique-se de incluir a classe Usuario

class Instrutor extends Usuario {
    private $nivelFormacao; // Corrigido o nome da variável
    private $instituicao; // Corrigido o nome da variável
    private $curso;

    // Getters
    public function getNivelFormacao() {
        return $this->nivelFormacao;
    }

    public function getInstituicao() {
        return $this->instituicao;
    }

    public function getCurso() {
        return $this->curso;
    }

    // Setters
    public function setNivelFormacao($nivelFormacao) {
        $this->nivelFormacao = $nivelFormacao;
    }

    public function setInstituicao($instituicao) {
        $this->instituicao = $instituicao;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
    }
}