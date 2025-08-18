<?php

class AnimalView
{

    function exibirTodosAnimais()
    {


        $animalController = new AnimalController();
        $listaTodosAnimais = $animalController->listar();

        for ($i = 0; $i < count($listaTodosAnimais); $i++) {
            echo "<div class='caixaAnimal'>
                        <a href='atendimento.html'>
                            <img src='images/flocos.png'>    
                            <div>
                                <h1>{$listaTodosAnimais[$i]->nome}</h1>
                                <p>{$listaTodosAnimais[$i]->especie->nome}</p>
                            </div>
                        </a>
                    </div>";
        }
    }

    function BuscarPeloNome($nome){
        $animalController = new AnimalController();
        $listaAnimalsComEsteNome = $animalController->BuscarPeloNome($nome);
          for ($i = 0; $i < count($listaAnimalsComEsteNome); $i++) {
            echo "<div class='caixaAnimal'>
                        <a href='atendimento.html'>
                            <img src='images/flocos.png'>    
                            <div>
                                <h1>{$listaAnimalsComEsteNome[$i]->nome}</h1>
                                <p>{$listaAnimalsComEsteNome[$i]->especie->nome}</p>
                            </div>
                        </a>
                    </div>";
        }
    }
    
}
