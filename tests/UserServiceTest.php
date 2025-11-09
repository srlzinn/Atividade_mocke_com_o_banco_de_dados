<?php

use PHPUnit\Framework\TestCase;
use App\Models\User;
use App\Services\UserService;
use App\Services\EmailService;
use App\Services\DatabaseService;

require_once __DIR__ . '/../src/Models/User.php';
require_once __DIR__ . '/../src/Services/EmailService.php';
require_once __DIR__ . '/../src/Services/DatabaseService.php';
require_once __DIR__ . '/../src/Services/UserService.php';

/*
 * Aqui eu criei testes unitários que verificam três pontos:
 * 1) Teste simples de unidade;
 * 2) Uso de mocks;
 * 3) Teste simulando salvamento no "banco de dados".
 */
class UserServiceTest extends TestCase
{
    // 🧩 Teste simples: verifica se o método retorna true
    public function testRegisterUserReturnsTrue()
    {
        $mockEmailService = $this->createMock(EmailService::class);
        $mockDatabaseService = $this->createMock(DatabaseService::class);

        $mockEmailService->method('sendWelcomeEmail')->willReturn(true);
        $mockDatabaseService->method('save')->willReturn(true);

        $userService = new UserService($mockEmailService, $mockDatabaseService);
        $user = new User('Lucca', 'lucca@example.com');

        $this->assertTrue($userService->registerUser($user));
    }

    // 🧠 Teste com mock: garante que o e-mail é enviado uma vez
    public function testSendEmailIsCalledOnce()
    {
        $mockEmailService = $this->createMock(EmailService::class);
        $mockDatabaseService = $this->createMock(DatabaseService::class);

        $mockEmailService->expects($this->once())
            ->method('sendWelcomeEmail')
            ->with('lucca@example.com')
            ->willReturn(true);

        $mockDatabaseService->method('save')->willReturn(true);

        $userService = new UserService($mockEmailService, $mockDatabaseService);
        $user = new User('Lucca', 'lucca@example.com');
        $userService->registerUser($user);
    }

    // 💾 Teste simulando salvamento no "banco de dados"
    public function testUserIsSavedInDatabase()
    {
        $mockEmailService = $this->createMock(EmailService::class);
        $databaseService = new DatabaseService(); // Aqui uso o real, sem mock

        $mockEmailService->method('sendWelcomeEmail')->willReturn(true);

        $userService = new UserService($mockEmailService, $databaseService);
        $user = new User('Lucca', 'lucca@example.com');
        $userService->registerUser($user);

        $data = $databaseService->getData();
        $this->assertCount(1, $data['users']); // Confirma que foi salvo
    }
}
