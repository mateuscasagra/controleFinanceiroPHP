<?php

class Movimentacao
{
    private $pdo;

    public function __construct(){
        $this->pdo = Conexao::getConexao();
    }


    public function carregaDados($id){
        $selectMovimento = $this->pdo->prepare("SELECT m.Id, Valor, Onde, Quando, Direcao, Nome as Tipo_Pagamento 
                                                       FROM movimentacao as m
                                                       LEFT JOIN tipo_pagamento as t
                                                       ON m.IdTipo_Pagamento = t.Id 
                                                       WHERE IdUsuario = :id");
        $selectMovimento->bindParam(":id", $id);
        $selectMovimento->execute();
        $retornoMovimento = $selectMovimento->fetchAll(PDO::FETCH_ASSOC);
        $selectTipoPagamento = $this->pdo->prepare("SELECT * FROM Tipo_Pagamento");
        $selectTipoPagamento->execute();
        $retornoTipoPagamento = $selectTipoPagamento->fetchAll(PDO::FETCH_ASSOC);
        $selectCategoria = $this->pdo->prepare('SELECT * FROM categorias');
        $selectCategoria->execute();
        $retornoCategoria = $selectCategoria->fetchAll(PDO::FETCH_ASSOC);
        return ['movimento' => $retornoMovimento,
        'tipoPagamento' => $retornoTipoPagamento,
        'categorias' => $retornoCategoria
    ];
    }

    public function lancarMovimentacao($param, $idUsuario){
    
        extract($param);
        $direcao = $Valor < 0 ? $direcao = 'Saída' : $direcao = 'Entrada';
        $inseriMovimentacao = $this->pdo->prepare('INSERT INTO movimentacao (Valor, Onde, Quando, IdTipo_Pagamento, IdUsuario, Direcao)
                                                          VALUES (:valor, :onde, :quando, :idpagamento, :idusuario, :direcao);');
        $inseriMovimentacao->bindParam(':valor', $Valor);
        $inseriMovimentacao->bindParam(':onde', $Onde);
        $inseriMovimentacao->bindParam(':quando', $Quando);
        $inseriMovimentacao->bindParam(':idpagamento', $IdTipoPagamento);
        $inseriMovimentacao->bindParam(':idusuario', $idUsuario);
        $inseriMovimentacao->bindParam(':direcao', $direcao);
        $resultado = $inseriMovimentacao->execute();

        return $resultado;

    }
}