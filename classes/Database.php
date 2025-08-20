<?php

class Database{

    private $servername;
    private $username;
    private $password;
    private $database;

    public $conn;

    public function __construct(){
        
    $this->servername = $_ENV['DB_HOST'] ?? 'mysql';
    $this->username = $_ENV['DB_USER'] ?? 'root';  
    $this->password = $_ENV['DB_PASS'] ?? 'rootpassword';
    $this->database = $_ENV['DB_NAME'] ?? 'portfolio';
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if($this->conn->connect_error){
            die("Connection error: " . $this->conn->connect_error);
        }

        $this->conn->set_charset("utf8mb4");

        return $this->conn;
    }
}
?>