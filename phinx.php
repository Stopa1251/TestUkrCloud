<?php


$pdo = new PDO("mysql:host=database", "root", "secret");
$pdo->exec("CREATE DATABASE IF NOT EXISTS test_ukr_cloud CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
echo "Database test_ukr_cloud created (if it didn't exist).";


return [
    'paths' => [
        'migrations' => 'migrations',
        'seeds' => 'seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'development' => [
            'adapter' => 'mysql',
//            'host' => '172.20.0.2',
            'host' => 'database',
            'name' => 'test_ukr_cloud',
            'user' => 'root',
            'pass' => 'secret',
            'port' => 3306
        ]
    ]
];
