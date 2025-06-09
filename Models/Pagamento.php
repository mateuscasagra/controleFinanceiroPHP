<?php

class Pagamento{
   private $pdo;
    public function __construct()
    {
        $this->pdo = Conexao::getConexao();
    }



    public function carregaPagamentos($id){
        $selectPagamentos = $this->pdo->prepare("SELECT Id, Nome FROM tipo_pagamento WHERE IdUsuario = :id ");
        $selectPagamentos->bindParam(":id", $id);
        $selectPagamentos->execute();
        $retorno = $selectPagamentos->fetchAll(PDO::FETCH_OBJ);
        return $retorno;

    }

    public function adicionaPagamento($nomePagamento, $id){ 
        $insertPagamento = $this->pdo->prepare("INSERT INTO tipo_pagamento (Nome, IdUsuario) 
                                                        VALUES (:nome, :id)"); 
        $insertPagamento->bindParam(':nome', $nomePagamento);
        $insertPagamento->bindParam(':id', $id);
        $retorno = $insertPagamento->execute();
        return $retorno;    
    }

    public function removePagamento($idPagamento, $idUsuario){
        $deletePagamento = $this->pdo->prepare('DELETE FROM tipo_pagamento WHERE Id = :idPagamento AND IdUsuario = :id');
        $deletePagamento->bindParam('idPagamento', $idPagamento);
        $deletePagamento->bindParam(':id', $idUsuario);
        $retorno = $deletePagamento->execute();
        return $retorno;
    }

    public function editaPagamento($param, $idUsuario){
        extract($param);
        $editaPagamento = $this->pdo->prepare('UPDATE tipo_pagamento SET  Nome = :nome WHERE Id = :id AND IdUsuario = :idUsuario');
        $editaPagamento->bindParam(":nome", $Nome);
        $editaPagamento->bindParam(":id", $Id);
        $editaPagamento->bindParam(':idUsuario', $idUsuario);
        $retorno = $editaPagamento->execute();
        return $retorno;
    }

}