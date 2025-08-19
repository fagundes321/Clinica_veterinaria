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
                $nome          = $dados['nm_animal'];
                $codigo        = $dados['cd_animal'];

                    $sql_especie = "SELECT nm_especie FROM `especie` WHERE cd_especie = :codigoEspecie";
                    $stmt_especie = $this->db->prepare($sql_especie);
                    $stmt_especie->bindParam(":codigoEspecie", $codigoEspecie);
                    $stmt_especie->execute();

                    $dadosEspecie = $stmt_especie->fetch(PDO::FETCH_ASSOC);
                    $nomeEspecie = $dadosEspecie['nm_especie'];

                    $especie = new EspecieModel($codigoEspecie, $nomeEspecie);
                // $stmt_especie = db->prepare("SELECT nm_especie FROM `especie` WHERE cd_especie = $codigoEspecie");

                $animal = new AnimalModel($codigo, $nome, $especie);
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

    function BuscarNome($nome){
    $lista = [];

    try 
    {
        // Agora filtra pelo nome do animal
        $sql = "SELECT `cd_animal`, `nm_animal`, `cd_especie` 
                FROM animal 
                WHERE nm_animal LIKE :nome";
        $stmt = $this->db->prepare($sql);
        $nomeBusca = "%" . $nome . "%"; // busca parcial
        $stmt->bindParam(":nome", $nomeBusca);
        $stmt->execute();

        while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) 
        {
            $codigoEspecie = $dados['cd_especie'];
            $nomeAnimal    = $dados['nm_animal'];
            $codigoAnimal  = $dados['cd_animal'];

            // Buscar nome da espécie
            $sql_especie = "SELECT nm_especie FROM `especie` WHERE cd_especie = :codigoEspecie";
            $stmt_especie = $this->db->prepare($sql_especie);
            $stmt_especie->bindParam(":codigoEspecie", $codigoEspecie);
            $stmt_especie->execute();

            $dadosEspecie = $stmt_especie->fetch(PDO::FETCH_ASSOC);
            $nomeEspecie = $dadosEspecie['nm_especie'];

            // Criar objeto espécie corretamente
            $especie = new EspecieModel($codigoEspecie, $nomeEspecie);

            // Criar objeto animal
            $animal = new AnimalModel($codigoAnimal, $nomeAnimal, $especie);

            array_push($lista, $animal);
        }

        $this->db = null;
    } 
    catch (PDOException $e) 
    {
        echo "Erro: " . $e->getMessage();
    }

    return $lista;
}

}
