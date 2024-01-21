<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    public $pdo;

    public function __construct()
    {
        require_once "config.php";

        $host = DB_HOST;
        $db   = DB_DATABASE;
        $user = DB_USERNAME;
        $pass = DB_PASSWORD;
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->pdo = new PDO("mysql:host=$host", $user, $pass, $options);

            $databaseExists = $this->pdo->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$db'")->fetch();

            if (!$databaseExists) {
                $createDbSql = "CREATE DATABASE `$db`";
                $this->pdo->exec($createDbSql);

                $this->pdo->exec("USE `$db`");

                $this->executeSqlFile("sql/progblog.sql");
            }

        } catch (PDOException $e) {
            die("DB ERROR: " . $e->getMessage());
        }

        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }


    public function query(string $query, array $values = null)
    {

        if ($values) {
            $values = array_values($values);
            $stmp = $this->pdo->prepare($query);
            $stmp->execute($values);
        } else {

            $stmp = $this->pdo->query($query)->fetchAll();
        }

        return $stmp;
    }

    protected function executeSqlFile(string $filePath)
    {
        $sqlContent = file_get_contents($filePath);

        try {
            $this->pdo->exec($sqlContent);
        } catch (PDOException $e) {
            echo "Error executing SQL file: " . $e->getMessage();
        }
    }
}
