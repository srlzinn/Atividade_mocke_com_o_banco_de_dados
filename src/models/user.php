<?php

namespace App\Models;

/*
 * Aqui eu criei a classe User, que representa um usuário do sistema.
 * Ela armazena as informações básicas e serve como estrutura de dados (Model).
 */
class User {
    public $name;
    public $email;

    public function __construct(string $name, string $email) {
        $this->name = $name;
        $this->email = $email;
    }
}
