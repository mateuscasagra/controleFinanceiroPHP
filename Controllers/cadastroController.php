<?php

class cadastroController extends Controller{
    public function index(){
        $this->carregarTemplate('Cadastro');


    }


    public function cadastro(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $novoUsuario = new Usuario();
        $id = $novoUsuario->Cadastrar($_POST);
        $_SESSION['usuario_id'] = $id;
        if(!empty($id)){  
            header('location: ?pag=planos');
            exit;
        }
        }
    }




    



}