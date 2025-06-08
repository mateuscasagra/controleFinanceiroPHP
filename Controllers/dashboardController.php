<?php

class DashboardController extends Controller{
    public function index(){
        if(!isset($_SESSION['usuario_id'])){
            header('location: ?pag=login');
        }
        $carrega = new Movimentacao();
        $id = $_SESSION['usuario_id'];
        $dados = $carrega->carregarDadosDashboard($id);
        $categoriasTotais = $dados['categoriasTotais'];
        $totais = $dados['totais'];
        $totaisMes = $dados['totaisMes'];
        $entradas = [];
        $saidas = [];
        $meses = [];
        foreach($totaisMes as $totaism){
            $entradas[] = $totaism->totalEntrada;
            $saidas[] = abs($totaism->totalSaida); 
            $meses[] = DateTime::createFromFormat('!m', $totaism->mes)->format('M');;
        }
        $this->carregarTemplate('Dashboard', ['Categorias' => $categoriasTotais, 'Totais' => $totais, 'totaisMesEntrada' => $entradas, 'totaisMesSaida' => $saidas, 'meses' => $meses]);
    }

}