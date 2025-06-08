<?php

class planosController extends Controller
{


    public function index()
    {

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
            $idUsuario = $_SESSION['usuario_id']->id;
        
            $usuario = new Planos();
            $usuario->escolhaPlano($idUsuario, $_POST['planoId']);
            header('location: ?pag=dashboard');

        }
    }




}