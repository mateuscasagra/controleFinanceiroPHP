<?php

class movimentacaoController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header('location: ?pag=login');
        }
        $id = $_SESSION['usuario_id'];
        $carrega = new Movimentacao();
        $dados = $carrega->carregaDadosMovimentacao($id);
        $movimento = $dados['movimento'];
        $tipoPagamentos = $dados['tipoPagamento'];
        $categorias = $dados['categorias'];
        $this->carregarTemplate('Movimentacao', ['movimento' => $movimento, 'tipoPagamento' => $tipoPagamentos, 'categorias' => $categorias]);

    }



    public function lancarMovimentacao()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_SESSION['usuario_id'];
            $lanca = new Movimentacao();
            $envia = $lanca->lancarMovimentacao($_POST, $id);
            if ($envia) {
                header('location: ?pag=movimentacao');
            }


        }
    }

    public function excluirMovimentacao()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_SESSION['usuario_id'];
            $exclui = new Movimentacao();
            $envia = $exclui->apagarMovimentacao($_POST['Id'], $id);
            if ($envia) {
                header('location: ?pag=movimentacao');
            }

        }
    }


    public function editaMovimentacao()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['Valor'] > 0 ? $direcao = 'Entrada': $direcao = 'Saída';
            $id = $_SESSION['usuario_id'];
            $edita = new Movimentacao();
            $envia = $edita->editaMovimentacao($_POST, $id, $direcao);
            if ($envia) {
                header('location: ?pag=movimentacao');
            }
    }

}
}