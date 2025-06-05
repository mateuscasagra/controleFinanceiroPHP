<?php


class Meta{
  private $pdo;
    public function __construct(){
        $this->pdo = Conexao::getConexao();
    }

}