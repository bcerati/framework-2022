<?php

return [
    'ENTITY_PATH' => dirname(__DIR__) . '/src/App/Entity',
    'DATABASE_CONFIG' => [
        'driver' => 'pdo_mysql',
        'dbname' => 'tests',
        'user' => 'root',
        'password' => 'toor',
        'host' => '127.0.0.1',
    ],
];
