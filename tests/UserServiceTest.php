<?php

use PHPUnit\Framework\TestCase;
use App\Models\User;
use App\Services\UserService;
use App\Services\EmailService;

require_once __DIR__ . '/../src/Models/User.php';
require_once __DIR__ . '/../src/Services/EmailService.php';
require_once __DIR__ . '/../src/Services/UserService.php';

/*
 * Aqui eu criei o teste unitário usando PHPUnit.
 * O objetivo é testar o UserService sem enviar e-mails reais.
 */
class UserServiceTest extends TestCase
{
    public function testRegisterUserSendsEmail()
    {
        // Crio um "mock" da classe EmailService
        // Isso me permite simular o envio de e-mail
        $mockEmailService = $this->createMock(EmailService::class);

        // Defino o comportamento esperado do mock:
        // sendWelcomeEmail deve ser chamado uma vez com o email certo
        $mockEmailService->expects($this->once())
            ->method('sendWelcomeEmail')
            ->with('lucca@example.com')
            ->willReturn(true); // Retorno simulado

        // Injetei o mock no UserService
        $userService = new UserService($mockEmailService);

        // Crio um objeto User para o teste
        $user = new User('Lucca', 'lucca@example.com');

        // Executo o método que quero testar
        $result = $userService->registerUser($user);

        // Verifico se o retorno foi verdadeiro
        $this->assertTrue($result);
    }
}
