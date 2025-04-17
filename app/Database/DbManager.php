<?php

namespace App\Database;

use PDO as DataBaseConnection;
use App\Config\Config;
use PDOStatement;

class DbManager 
{
    private static ?DbManager $instance = null;
    private DataBaseConnection $pdo;

    private function __construct()
    {
        Config::load();
        $host = Config::get('host'); 
        $dbname = Config::get('dbname'); 
        $username = Config::get('username'); 
        $password = Config::get('password'); 

        $dbConn = "mysql:hsot={$host};dbname={$dbname}";
        $this->pdo = new DataBaseConnection($dbConn, $username, $password);
        $this->pdo->setAttribute(DataBaseConnection::ATTR_ERRMODE, DataBaseConnection::ERRMODE_EXCEPTION);
    }

    public static function getInstance(): self
    {
        return self::$instance ?? (self::$instance = new DbManager());
    }

    public function query(string $sql, array $params = []): PDOStatement
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function beginTransaction(): void
    {
        $this->pdo->beginTransaction();
    }

    public function commit(): void
    {
        $this->pdo->commit();
    }

    public function rollBack(): void
    {
        $this->pdo->rollBack();
    }
}