<?php

namespace App\configs;
use PDO;

class Database
{
    protected static PDO $instance;

    public function __construct()
    {
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
