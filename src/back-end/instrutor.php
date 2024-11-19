<?php
require_once __DIR__ . '/usuario.php';

class Instrutor extends Usuario {
    private $nivelFormacao;
    private $instituicaoFormacao;
    private $curso;

    // Getters
    public function getNivelFormacao() {
        return $this->nivelFormacao;
    }

    public function getInstituicaoFormacao() {
        return $this->instituicaoFormacao;
    }

    public function getCurso() {
        return $this->curso;
    }

    // Setters
    public function setNivelFormacao($nivelFormacao) {
        $this->nivelFormacao = $nivelFormacao;
    }

    public function setInstituicaoFormacao($instituicaoFormacao) {
        $this->instituicaoFormacao = $instituicaoFormacao;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
    }
}