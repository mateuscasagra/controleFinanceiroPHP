<?php
use Exception;
use PDO;


class Conexao{

    private static $conn;

    private function __construct(){}
    public static function getConexao(){
        if(!isset(self::$conn)){

        $dbName = 'controle_financeiro';
        $host = 'localhost';
        $user = 'root';
        $senha = '';

        try {
            self::$conn = new PDO('mysql:dbname='.$dbName.'host='.$host,$user,$senha);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    return self::$conn;
}

}