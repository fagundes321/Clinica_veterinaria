<?php
include __DIR__ . "/../Config/Conn.php";

class AnimalController
{  
    private $db;

    function __construct()
    {
        $conn = new Conn;
        $this->db = $conn->retornarConexao();

    }
    

    function Listar() {
     
        try {
            $sql = "SELECT `cd_animal`, `nm_animal`, `cd_especie` FROM animal";
            $stmt = $this->db->prepare;
        } catch (PDOException $e) {
            # code...
        }

    }

}
