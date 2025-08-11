<?php

namespace config;

class Database {
    private $host = 'db';
    private $database = 'blog';
    private $username = 'user';
    private $password = 'password';
    private $connection;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        try {
            $this->connection = new \PDO("pgsql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}