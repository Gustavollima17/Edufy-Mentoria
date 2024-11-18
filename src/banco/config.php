
<?php
// Configurações de banco de dados
return [
    'driver' => 'sqlite', // Alternar para 'mysql' na produção
    'sqlite' => [
        'database' => __DIR__ . '/banco.sqlite', // Caminho para o SQLite
    ],
    'mysql' => [
        'host' => '127.0.0.1',
        'database' => 'seu_banco',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8mb4',
    ],
];
