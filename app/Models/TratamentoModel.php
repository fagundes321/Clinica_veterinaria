<?php

class TratamentoModel
{
    public $codigo;
    public $nome;
    public $descricao;


   function __construct($codigo = null, $nome = null, $descricao = null)
    {

        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->descricao = $descricao;
    }
}
