<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\UserService;
use App\Services\EmailService;

/*
 * Criei o UserController para coordenar as ações do sistema.
 * Ele recebe dados de entrada (nome e email) e chama o UserService para processar.
 */
class UserController {
    public function register(string $name, string $email): void {
        // Crio a instância real do serviço de e-mail
        $emailService = new EmailService();

        // Injetei o serviço no UserService
        $userService = new UserService($emailService);

        // Crio um objeto usuário com os dados recebidos
        $user = new User($name, $email);

        // Chamo o método que registra o usuário
        if ($userService->registerUser($user)) {
            echo "Cadastro concluído e e-mail enviado!\n";
        } else {
            echo "Erro ao enviar e-mail.\n";
        }
    }
}

// Exemplo de execução
$controller = new UserController();
$controller->register('Lucca', 'lucca@example.com');
