<?php

namespace Opium\EcommerceWebsite;

use PDO;
use Exception;
use PDOException;

class db
{

    private static $db;

    public static function getDB()
    {
        $host = 'localhost';
        $db_type = 'mysql';
        $db_port = '3307';
        $db_name = 'ecomm';
        $user = 'root';
        $pass = '';
        $dsn = "$db_type:host=$host:$db_port;dbname=$db_name";
        try {
            self::$db = new PDO($dsn, $user, $pass);
        } catch (PDOException $error) {
            throw new Exception('Eroor');
            echo "Error" . $error->getMessage();
        }
    }

    public static function ExecQuery($query, $arg = [])
    {
        if (!isset(self::$db)) self::getDB();
        $stmt = self::$db->prepare($query);
        $stmt->execute($arg);
        return $stmt;
    }
}
