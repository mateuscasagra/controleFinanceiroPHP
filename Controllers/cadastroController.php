<?php

class cadastroController extends Controller{
    public function index(){
        $this->carregarTemplate('Cadastro');


    }


    public function cadastro(array $param){
        $novoUsuario = new Usuario();
        if($novoUsuario->Cadastrar($param)){
            $this->carregarTemplate('home');
        }
    }



}