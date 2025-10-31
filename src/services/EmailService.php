<?php

namespace App\Services;

/*
 * Aqui eu criei a classe EmailService, responsável por enviar e-mails.
 * No teste, vou usar um "mock" dessa classe para simular o envio sem enviar e-mails reais.
 */
class EmailService {
    public function sendWelcomeEmail(string $email): bool {
        // No código real, aqui enviaria o e-mail
        echo "Enviando e-mail de boas-vindas para {$email}\n";
        return true; // Retorno simulado de sucesso
    }
}
