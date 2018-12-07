<?php
require_once __DIR__ . '/bo/UsuarioBO.class.php';
$usuario = new Usuario(
    $_POST['nome'],
    $_POST['ultimoNome'],
    $_POST['cpf'],
    $_POST['rg'],
    $_POST['dataNascimento'],
    $_POST['login'],
    $_POST['senha'],
    $_POST['email']
);
$usuarioBO = new UsuarioBO();
$usuarioBO->cadastrarOuEditar($usuario);

?>