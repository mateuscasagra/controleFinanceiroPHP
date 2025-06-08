<?php

class Planos{
    private $pdo;
    public function __construct(){
        $this->pdo = Conexao::getConexao();
    }

    public function getPlanos(){
        $query = $this->pdo->prepare("SELECT *, pe.Limite_Lancamento, pe.Limite_Metas  
                                             FROM planos pl
                                             LEFT JOIN permissoes pe
                                             ON pl.id = pe.id");
        $query->execute();
        $retorno = $query->fetchAll(PDO::FETCH_OBJ);
        return $retorno;
    }

    public function escolhaPlano($idUsuario, $idPlano)
    {
        try {

            $updateQuery = $this->pdo->prepare("UPDATE usuario SET idPlano = :idPlano WHERE Id = :id AND IdPlano IS NULL");
            $updateQuery->bindParam(":idPlano", $idPlano);
            $updateQuery->bindParam(":id", $idUsuario);
            $updateQuery->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}




