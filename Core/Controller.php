<?php
class Controller{
    public $dados;


    public function carregarTemplate($nomeView, $dadosModel = array()){
        $this->dados = $dadosModel;
    
        require 'Views/template.php';
    }

    public function carregarViewTemplate($nomeView, $dadosModel = array()){
        extract($dadosModel);
       
        require 'Views/' . $nomeView .'.php';
    }


}




?>