<?php

namespace App\Models;

/*
 * Aqui eu criei a classe User, que representa um usuário do sistema.
 * Eu defini os atributos name e email e o construtor para inicializar esses dados.
 * A ideia é que o Model só armazene dados, sem lógica de negócio.
 */
class User {
    public $name;
    public $email;

    public function __construct(string $name, string $email) {
        $this->name = $name;    // Armazeno o nome do usuário
        $this->email = $email;  // Armazeno o e-mail do usuário
    }
}
