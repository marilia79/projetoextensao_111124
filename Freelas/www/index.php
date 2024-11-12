<?php


require '../vendor/autoload.php';

use Freelas\Model\Usuario;

define('PATH', preg_replace('/\\\\|\/$/', '', dirname($_SERVER["SCRIPT_NAME"])));

// localhost/miguel/freelas/www/?c=Usuario&a=listar
//localhost/miguel/freelas/www/Usuario/listar

$controller = filter_input(INPUT_GET,'c');
$action = filter_input(INPUT_GET,'a');
$url = filter_input(INPUT_GET,'_url');

if ($controller && $action) {
    $controller = '\Freelas\Controller\\' . ucfirst($controller);
    $c = new $controller;
    $c->$action();
}
elseif($url){
    $parts = explode('/',$url);
    $controller = '\Freelas\Controller\\' . ucfirst($parts[0]);
    $action = $parts[1];
    $c = new $controller;
    $c->$action(); 
}

# ------------busca todos-----------------
// $users = Usuario::lista();
// foreach($users as $u){
//     echo "<p>$u->nome</p>";
// }

# ------------busca um por id-----------------
// $user = Usuario::buscarPorId(2);
// var_dump($user);

# -------------novo----------------
// $user = new Usuario;
// $user->nome = 'Euclides';
// $user->email = 'euclides@euclides.com';
// $user->senha = 'abcde';
// $user->salvar();

# -------------edita----------------
// $user = Usuario::buscarPorId(2);
// $user->senha = '333';
// $user->salvar();

# --------------deleta---------------
// $user = Usuario::buscarPorId(4);
// $user->deletar();