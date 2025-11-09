<?php

namespace App\Services;

use App\Models\User;

/*
 * Classe que contém a lógica principal do sistema.
 * Aqui eu registro o usuário (salvo no banco) e envio o e-mail de boas-vindas.
 */
class UserService {
    private $emailService;
    private $databaseService;

    public function __construct(EmailService $emailService, DatabaseService $databaseService) {
        $this->emailService = $emailService;
        $this->databaseService = $databaseService;
    }

    public function registerUser(User $user): bool {
        // Salvo o usuário (simulação de insert no banco)
        $this->databaseService->save('users', [
            'name' => $user->name,
            'email' => $user->email
        ]);

        // Envio o e-mail de boas-vindas
        return $this->emailService->sendWelcomeEmail($user->email);
    }
}
