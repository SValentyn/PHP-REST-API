<?php

namespace app\Controllers;

use mysqli;
use Dotenv\Dotenv;

class Connection
{
    private $host;
    private $user;
    private $password;
    private $database;

    public function __construct()
    {
        $dotEnv = Dotenv::createImmutable(__DIR__ . '/../../../'); // change to path to .env
        $dotEnv->load();
        $this->host = getenv('DB_HOST');
        $this->user = getenv('DB_USER');
        $this->password = getenv('DB_PASSWORD');
        $this->database = getenv('DB_DATABASE');
    }

    public function getConnection()
    {
        $connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        return $connection;
    }
}