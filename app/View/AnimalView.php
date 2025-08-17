<?php

class AnimalView
{

    function exibirTodosAnimais()
    {


        $animalController = new AnimalController();
        $listaTodosAnimais = $animalController->listar();

        for ($i = 0; $i < count($listaTodosAnimais); $i++) {
            echo "<p>" . $listaTodosAnimais[$i]->nome . "</p>";
        }
    }
}
