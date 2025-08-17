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


    function listar()
    {
        $lista = [];

        try 
        {
            $sql = "SELECT `cd_animal`, `nm_animal`, `cd_especie` FROM animal";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            // esse deixa eu associar a tabela com seu associativo
            while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) 
                {
                $codigoEspecie = $dados['cd_especie'];
                $nome        = $dados['nm_animal'];
                $codigo        = $dados['cd_animal'];

                $animal = new AnimalModel($codigo, $nome, $codigoEspecie);
                // array_push é responsavel por acrescentar no final de um array um novo item 
                array_push($lista, $animal);

            }

            $this->db = null;
        } 
        catch (PDOException $e) 
        {
            echo "Erro: " . $e->getMessage();
        }

        // no final eu retorno a lista para eu ter acesso no lado de fora da função
        return $lista;
    }
}
