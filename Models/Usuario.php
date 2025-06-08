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

            if ($resultado) {
                $usuarioId = $this->pdo->lastInsertId();
                return $usuarioId;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }




    public function verificaEmailCadastrado($email)
    {
        $buscaEmail = $this->pdo->prepare('SELECT * FROM usuario WHERE Email = :email');
        $buscaEmail->bindParam(':email', $email);
        $buscaEmail->execute();
        $resultado = $buscaEmail->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function fazerLogin($param)
    {
        extract($param);

        $buscaUsuario = $this->pdo->prepare("SELECT Id, Email, Senha_Hash FROM usuario WHERE Email = :email");
        $buscaUsuario->bindParam(':email', $email);
        $buscaUsuario->execute();
        $usuario = $buscaUsuario->fetch(PDO::FETCH_ASSOC);
    
        
        if ($usuario && password_verify($senha, $usuario['Senha_Hash'])) {
            return $usuario['Id'];
        }

        return false;
    }

}