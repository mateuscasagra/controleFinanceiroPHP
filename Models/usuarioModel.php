<?php


class Usuario
{


    private $pdo;
    public function __construct()
    {
        $this->pdo = Conexao::getConexao();
    }


    public function Cadastrar(array $param)
    {
        try {
            extract($param);
            $verificaEmail = $this->verificaEmailCadastrado($email);
            if ($verificaEmail) {
                echo "Email já cadastrado";
                return false;
            }
            $nomeCompleto = trim($nome . ' ' . $sobrenome);
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);


            $insertUsuario = $this->pdo->prepare("INSERT INTO usuario (Nome, Email, Senha_Hash, Data_Cadastro) VALUES (:Nome, :Email, :Senha, CURDATE())");
            $insertUsuario->bindParam(':Nome', $nomeCompleto);
            $insertUsuario->bindParam(':Email', $email);
            $insertUsuario->bindParam(':Senha', $senhaHash);
            $resultado = $insertUsuario->execute();

            return $resultado;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function verificaEmailCadastrado($email)
    {
        $buscaEmail = $this->pdo->prepare('SELECT * FROM usuario WHERE Email = :email');
        $buscaEmail->bindParam(':Email', $email);
        $buscaEmail->execute();
        $resultado = $buscaEmail->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }
}