<?php


class pagamentoController extends Controller{
    public function index(){
        $id = $_SESSION['usuario_id'];
        $carrega = new Pagamento();
        $envia = $carrega->carregaPagamentos( $id );
        $this->carregarTemplate('Pagamentos', ['pagamentos' => $envia ] );
    }

    public function adicionaPagamento(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_SESSION['usuario_id'];
        $adiciona = new Pagamento();
        $envia = $adiciona->adicionaPagamento($_POST['Nome'], $id );
        if( $envia ){ 
            header('location: ?pag=pagamento');
        }
        }
    }

    public function excluiPagamento(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_SESSION['usuario_id'];
            $remove = new Pagamento();
            $envia = $remove->removePagamento($_POST['Id'], $id);
            if( $envia ){
            header('location: ?pag=pagamento');
        }
        }
        
    }

    public function editaPagamento(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_SESSION['usuario_id'];
            $edita = new Pagamento();
            $envia = $edita->editaPagamento($_POST, $id );
            if( $envia ){
            header('location: ?pag=pagamento');
        }
        }
        
    }
}