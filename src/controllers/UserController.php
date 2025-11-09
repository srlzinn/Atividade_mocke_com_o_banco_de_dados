<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\UserService;
use App\Services\EmailService;
use App\Services\DatabaseService;

/*
 * O controller coordena as ações do sistema.
 * Ele chama os serviços e passa os dados para o UserService.
 */
class UserController {
    public function register(string $name, string $email): void {
        $emailService = new EmailService();
        $databaseService = new DatabaseService();
        $userService = new UserService($emailService, $databaseService);

        $user = new User($name, $email);

        if ($userService->registerUser($user)) {
            echo "Usuário cadastrado e e-mail enviado com sucesso!\n";
        } else {
            echo "Erro no cadastro.\n";
        }
    }
}

// Exemplo de execução manual
// $controller = new UserController();
// $controller->register('Lucca', 'lucca@example.com');
