<?php

namespace App\Services;

use App\Models\User;

class UserService {
    private $emailService;

    public function __construct(EmailService $emailService) {
        $this->emailService = $emailService;
    }

    public function registerUser(User $user): bool {
        // Aqui salvaria o usuário no banco (simulado)
        echo "Usuário {$user->name} cadastrado com sucesso!\n";

        // Envia e-mail de boas-vindas
        return $this->emailService->sendWelcomeEmail($user->email);
    }
}
