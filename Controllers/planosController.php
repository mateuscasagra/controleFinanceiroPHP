<?php

class planosController extends Controller
{


    public function index()
    {
        if(!isset($_SESSION['usuario_id'])){
            header('location: ?pag=login');
        }

        $planos = new Planos();
        $planosRetorno = $planos->getPlanos();
        foreach ($planosRetorno as $plano) {
            $plano->Limite_Lancamento = $plano->Limite_Lancamento == 0 ? "Ilimitado" : $plano->Limite_Lancamento;
            $plano->Limite_Metas = $plano->Limite_Metas == 0 ? "Ilimitado" : $plano->Limite_Metas;
        }
        $this->carregarTemplate('Planos', ['planos' => $planosRetorno]);
    }


    public function escolhaPlano()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_SESSION[''];
            $usuario = new Planos();
            $usuario->escolhaPlano($id, $_POST['planoId']);
            header('location: ?pag=dashboard');

        }
    }




}