<?php

class Conn {
    private $hostname = 'mysql-db';
    private $port     = '3306';
    private $database = 'Veterinario';
    private $username = 'db_user';
    private $password = '123';
    private $con;

    public function __construct() {
        try {
            $dsn = "mysql:host={$this->hostname};port={$this->port};dbname={$this->database}";
            $this->con = new PDO($dsn, $this->username, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Falha na conexão: " . $e->getMessage();
        }
    }

    public function retornarConexao() {
        return $this->con;
    }
}
