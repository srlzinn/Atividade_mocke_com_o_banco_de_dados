<?php

namespace App\Services;

/*
 * Classe responsável por enviar e-mails.
 * No teste, vou usar um mock dessa classe para simular o envio real.
 */
class EmailService {
    public function sendWelcomeEmail(string $email): bool {
        echo "Enviando e-mail de boas-vindas para {$email}\n";
        return true;
    }
}
