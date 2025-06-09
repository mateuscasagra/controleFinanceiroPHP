<?php
class homeController extends Controller{
    public function index(){
        
        $this->carregarTemplate('home');
    }

    public function sair(){
        session_destroy();
        header('location: ?pag=home');
        
    }
}


?>