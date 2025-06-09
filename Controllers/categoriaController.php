<?php

class categoriaController extends Controller
{
    public function index()
    {
        $id = $_SESSION['usuario_id'];
        $carrega = new Categoria();
        $envia = $carrega->carregaCategorias($id);
        $this->carregarTemplate('Categoria', ['categorias' => $envia]);
    }


    public function adicionaCategoria()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_SESSION['usuario_id'];
            $adicionaCategoria = new Categoria();
            $envia = $adicionaCategoria->adicionarCategoria($_POST['Categoria'], $id);
            if ($envia) {
                header('location: ?pag=categoria');
            }
        }


    }

    public function excluirCategoria()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_SESSION['usuario_id'];
            $removeCategoria = new Categoria();
            $envia = $removeCategoria->removeCategoria($_POST['Id'], $id);
            if ($envia) {
                header('location: ?pag=categoria');
            }
        }
    }

    public function editaCategoria()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_SESSION['usuario_id'];
            $editaCategoria = new Categoria();
            $envia = $editaCategoria->editaCategoria($_POST, $id);
            if($envia){
                header('location: ?pag=categoria');
            }
        }
    }
}