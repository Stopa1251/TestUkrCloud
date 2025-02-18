<?php

namespace App\configs;
use PDO;

class Database
{
    private $host = DB_HOST;
    private $db = DATABASE;
    private $user = DB_USER;
    private $pass = DB_PASSWORD;
    private $pdo;
    protected static PDO $instance;

    public function __construct()
    {
//        $dsn = "mysql:host={$this->host};dbname={$this->db}";
//
//        $this->pdo = new PDO($dsn, $this->user, $this->pass);
//        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        self::connect();

    }

    public static function connect(): PDO {
        if(!isset(self::$instance)) {
            self::$instance = new PDO(
                DSN,
                DB_USER,
                DB_PASSWORD,
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
        }

        return self::$instance;
    }

    public function query($sql, $params = [])
    {
        $stmt = self::$instance->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function execute($sql, $params = [])
    {
        $stmt = self::$instance->prepare($sql);
        return $stmt->execute($params);
    }
}
