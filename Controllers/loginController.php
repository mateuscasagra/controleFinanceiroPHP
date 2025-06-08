<?php

class LoginController extends Controller
{
    public function index()
    {
        $this->carregarTemplate('Login');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $loginUsuario = new Usuario();
            $id = $loginUsuario->fazerLogin($_POST);
            $_SESSION['usuario_id'] = $id;
            if (!empty($id)) {
                header('location: ?pag=dashboard');
                exit;
            }
        }
    }
}