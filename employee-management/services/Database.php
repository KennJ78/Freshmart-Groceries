<?php
class Database
{
    private $host;
    private $dbname;
    private $user;
    private $pass;
    public $conn;

    public function __construct()
    {
        $config = include __DIR__ . '/../config.php';
        $this->host = $config['DB_HOST'];
        $this->dbname = $config['DB_NAME'];
        $this->user = $config['DB_USER'];
        $this->pass = $config['DB_PASS'];

        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
