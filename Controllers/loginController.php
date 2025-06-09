<?php

class loginController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['usuario_id'])) {
            header('location: dashboard');
        } else {
            $this->carregarTemplate('Login');
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $loginUsuario = new Usuario();
            $retorno = $loginUsuario->fazerLogin($_POST);

            if (!empty($retorno)) {
                $_SESSION['usuario_id'] = $retorno;
                header('location: ?pag=dashboard');
                exit;
            }
        }
    }
}