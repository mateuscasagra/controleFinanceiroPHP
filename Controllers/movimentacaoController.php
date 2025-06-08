<?php

class MovimentacaoController extends Controller{
    public function index(){
        $id = $_SESSION['usuario_id'];
        $carrega = new Movimentacao();
        $dados = $carrega->carregaDados($id->id);
        $movimento = $dados['movimento'];
        $tipoPagamentos = $dados['tipoPagamento'];
        $categorias = $dados['categorias'];
        $this->carregarTemplate('Movimentacao', ['movimento' => $movimento, 'tipoPagamento'=> $tipoPagamentos, 'categorias' => $categorias]);

    }



    public function lancarMovimentacao(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lanca = new Movimentacao();
            $id = $_SESSION['usuario_id'];
            $envia = $lanca->lancarMovimentacao($_POST, $id->id);
            if($envia){
                header('location: ?pag=movimentacao');
            }
             
           
        }
    }
}