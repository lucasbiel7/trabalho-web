<?php
session_start();
require_once __DIR__ . '/bo/UsuarioBO.class.php';

$usuario = new Usuario(
    $_POST['nome'],
    $_POST['ultimoNome'],
    $_POST['cpf'],
    $_POST['rg'],
    $_POST['dataNascimento'],
    $_POST['endereco'],
    $_POST['login'],
    $_POST['senha'],
    $_POST['email']
);
$usuario->setId($_POST['id']);

$usuarioBO = new UsuarioBO();

try {
    $usuarioBO->cadastrarOuEditar($usuario);
    /**
     * Atualizar dados do usuário na sessão
     */
    if (!empty($usuario->getId())) {
        unset($_SESSION['usuario']);
        $_SESSION['usuario'] = serialize($usuario);
    }
    header('Location: ../view/sistema.php');
} catch (CadastroPessoaException $e) {
    setcookie('manterUsuario', serialize($usuario), time() + 10, '/');
    if (empty($usuario->getId())) {
        header("Location: ../view/cadastrar-usuario.php?error=" . $e->getMessage());
    } else {
        header("Location: ../view/sistema.php?tela=mu&error=" . $e->getMessage());
    }
}
?>