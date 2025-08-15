<?php 

    

    spl_autoload_register(function($nomeClasse){

        $pastaApp = "app/";

        $possiveisCaminhosPasta = [
            $pastaApp,
            $pastaApp.'Models/',
            $pastaApp.'Controllers/',
            $pastaApp.'Views/',
            $pastaApp.'Config/' 
        ];
        

        foreach ($possiveisCaminhosPasta as $pastaAtual){
            $nomeDoArquivo = $pastaAtual.$nomeClasse.".php";
            if(file_exists($nomeDoArquivo)){
                require_once $nomeDoArquivo;
                break;
            }
        }

    });

?>