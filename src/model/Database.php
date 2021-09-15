<?php
namespace App\model;

use \PDO;

class Database
{
    private static $pdo;

    public static function getDb()
    {
        if (self::$pdo === NULL) {
            self::$pdo = new PDO('mysql:host=localhost;dbname=forms;charset=utf8', 'root', 'root', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS
            ]);
        }
        return self::$pdo;
    }
}
