<?php 

class EspecieModel{
    public $codigo;
    public $nome;

    function __construct($codigo = null, $nome = null)
    {

     $this->codigo = $codigo;
     $this->nome = $nome;   
    
    }
}