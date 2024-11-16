<?php
// Funções auxiliares

function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validarCPF($cpf) {
    return preg_match('/^\d{11}$/', $cpf);
}

function validarTelefone($telefone) {
    return preg_match('/^\(?\d{2}\)?[\s-]?\d{4,5}[-]?\d{4}$/', $telefone);
}
