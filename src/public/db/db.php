<?php 

use PDO;

class Database {
    private $host = 'mysql';
    private $db = 'aeropuertos';
    private $user = 'alumno';
    private $pass = 'alumno';
    private $charset = 'utf8mb4';

    public $pdo = null;

    public function connect() {
        if ($this->pdo === null) {
            $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
            try {
                $this->pdo = new PDO($dsn, $this->user, $this->pass);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
            }
        }
        return $this->pdo;
    }
}