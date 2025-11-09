<?php

namespace App\Services;

/*
 * Aqui eu criei o DatabaseService, responsável por simular o salvamento no banco de dados.
 * No mundo real, aqui teria uma conexão real (PDO, MySQL, etc.).
 */
class DatabaseService {
    private $data = [];

    public function save(string $table, array $record): bool {
        // Simula um insert no banco
        $this->data[$table][] = $record;
        echo "Registro salvo na tabela '{$table}'\n";
        return true;
    }

    public function getData(): array {
        return $this->data;
    }
}
