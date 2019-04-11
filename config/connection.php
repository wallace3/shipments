<?php

class Database extends PDO { 

    private $motor = 'mysql';
    private $host = 'localhost';
    private $database = 'shipments';
    private $user = 'root';
    private $password = ''; 

    public function __construct() {
        try{
            parent::__construct("{$this->motor}:dbname={$this->database};host={$this->host};charset=utf8", $this->user, $this->password);
        }catch(PDOException $e) {
            echo 'There was an error making the connection.  Detail: ' . $e->getMessage();
            exit;
        }
    } 
} 

?>