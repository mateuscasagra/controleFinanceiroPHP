<?php

class cadastroController extends Controller{
    public function index(){
        $this->carregarTemplate('Cadastro');


    }


    public function cadastro(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $novoUsuario = new Usuario();
        $retorno = $novoUsuario->Cadastrar($_POST);
       
        if(!empty($retorno)){  
            $_SESSION['usuario_id'] = $retorno;
            header('location: ?pag=planos');
            exit;
        }
        }
    }




    



}