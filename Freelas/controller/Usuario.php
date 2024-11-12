<?php
namespace Freelas\Controller;

use Freelas\Model\Usuario as UsuarioModel;

class Usuario{

    public function listar(){
        echo 'Chamou listar usuário';
        $usuarios = UsuarioModel :: lista();
        $view = '../view/Usuario/listar.php';
        require '../template/template1.php';
        
    }

}