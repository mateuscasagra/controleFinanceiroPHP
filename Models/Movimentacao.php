<?php

class Movimentacao
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Conexao::getConexao();
    }


    public function carregaDadosMovimentacao($id)
    {
        $selectMovimento = $this->pdo->prepare("SELECT m.Id, Valor, Onde, Quando, Direcao, t.Nome as Tipo_Pagamento, c.Nome as Categoria 
                                                       FROM movimentacao as m
                                                       LEFT JOIN tipo_pagamento as t
                                                       ON m.IdTipo_Pagamento = t.Id
                                                       LEFT JOIN categorias c
                                                       ON m.IdCategoria = c.Id
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
        return [
            'movimento' => $retornoMovimento,
            'tipoPagamento' => $retornoTipoPagamento,
            'categorias' => $retornoCategoria
        ];
    }

    public function lancarMovimentacao($param, $idUsuario)
    {

        extract($param);
        $direcao = $Valor < 0 ? $direcao = 'Saída' : $direcao = 'Entrada';
        $inseriMovimentacao = $this->pdo->prepare('INSERT INTO movimentacao (Valor, Onde, Quando, IdTipo_Pagamento, IdCategoria, IdUsuario, Direcao)
                                                          VALUES (:valor, :onde, :quando, :idpagamento, :idcategoria, :idusuario, :direcao);');
        $inseriMovimentacao->bindParam(':valor', $Valor);
        $inseriMovimentacao->bindParam(':onde', $Onde);
        $inseriMovimentacao->bindParam(':quando', $Quando);
        $inseriMovimentacao->bindParam(':idpagamento', $IdTipoPagamento);
        $inseriMovimentacao->bindParam(':idcategoria', $Categoria);
        $inseriMovimentacao->bindParam(':idusuario', $idUsuario);
        $inseriMovimentacao->bindParam(':direcao', $direcao);
        $resultado = $inseriMovimentacao->execute();

        return $resultado;

    }

    public function carregarDadosDashboard($id)
    {
        $selectValoresCategoria = $this->pdo->prepare('SELECT c.Nome as Categoria, 
                                                             SUM(CASE WHEN m.Valor > 0 THEN m.Valor ELSE 0 END) AS totalEntradaCategoria, 
                                                             SUM(CASE WHEN m.Valor < 0 THEN m.Valor ELSE 0 END) AS totalSaidaCategoria, 
                                                             SUM(m.Valor) AS saldoCategoria 
                                                             FROM movimentacao m 
                                                             LEFT JOIN categorias c 
                                                             ON m.IdCategoria = c.Id 
                                                             WHERE IdUsuario = :id 
                                                             GROUP BY c.Nome;');
        $selectValoresCategoria->bindParam(':id', $id);
        $selectValoresCategoria->execute();
        $dadosCategorias = $selectValoresCategoria->fetchAll(PDO::FETCH_OBJ);
        $selectTotais = $this->pdo->prepare('SELECT
                                                    SUM(CASE WHEN m.Valor > 0 THEN m.Valor ELSE 0 END) AS totalEntrada,
                                                    SUM(CASE WHEN m.Valor < 0 THEN m.Valor ELSE 0 END) AS totalSaida,
                                                    SUM(m.Valor) AS saldo
                                                    FROM movimentacao m
                                                    WHERE IdUsuario = :id ');
        $selectTotais->bindParam(':id', $id);
        $selectTotais->execute();
        $dadosTotais = $selectTotais->fetch(PDO::FETCH_OBJ);
        $selectTotaisMes = $this->pdo->prepare( 'SELECT MONTH(m.Quando) AS mes, 
                                                        SUM(CASE WHEN m.Valor > 0 THEN m.Valor ELSE 0 END) AS totalEntrada, 
                                                        SUM(CASE WHEN m.Valor < 0 THEN m.Valor ELSE 0 END) AS totalSaida, 
                                                        SUM(m.Valor) AS saldo 
                                                        FROM movimentacao m 
                                                        WHERE m.IdUsuario = :id AND YEAR(m.Quando) = YEAR(CURDATE()) 
                                                        GROUP BY MONTH(m.Quando) 
                                                        ORDER BY mes;
');
        $selectTotaisMes->bindParam(':id',$id);
        $selectTotaisMes->execute();
        $dadosTotaisMes = $selectTotaisMes->fetchAll(PDO::FETCH_OBJ);
        return [
            'categoriasTotais' => $dadosCategorias,
            'totais' => $dadosTotais,
            'totaisMes' => $dadosTotaisMes
        ];
    }
}