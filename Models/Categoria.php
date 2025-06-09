<?php

class Categoria
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Conexao::getConexao();
    }

    public function carregaCategorias($id)
    {
        $selectCategoria = $this->pdo->prepare("SELECT Id, Nome FROM categorias WHERE IdUsuario = :id");
        $selectCategoria->bindParam(":id", $id);
        $selectCategoria->execute();
        $retorno = $selectCategoria->fetchAll(PDO::FETCH_OBJ);
        return $retorno;
    }

    public function adicionarCategoria($nomecategoria, $id)
    {
        $insertCategoria = $this->pdo->prepare("INSERT INTO categorias (Nome, IdUsuario) VALUES (:nome, :id)");
        $insertCategoria->bindParam(':nome', $nomecategoria);
        $insertCategoria->bindParam(":id", $id);
        $retorno = $insertCategoria->execute();
        return $retorno;

    }

    public function removeCategoria($idCategoria, $id)
    {
        $deleteCategoria = $this->pdo->prepare("DELETE FROM categorias WHERE Id = :idCategoria AND IdUsuario = :id");
        $deleteCategoria->bindParam(':idCategoria', $idCategoria);
        $deleteCategoria->bindParam(":id", $id);
        $retorno = $deleteCategoria->execute();
        return $retorno;
    }

    public function editaCategoria($param, $idUsuario){
        extract($param);
        $updateCategoria = $this->pdo->prepare("UPDATE categorias SET Nome = :nome WHERE Id = :id AND IdUsuario = :idUsuario");
        $updateCategoria->bindParam(":nome", $Categoria);
        $updateCategoria->bindParam(":id", $Id);
        $updateCategoria->bindParam(':idUsuario', $idUsuario);
        $retorno = $updateCategoria->execute();
        return $retorno;

    }
}