<?php
session_start();
require_once 'bo/UsuarioBO.class.php';
$usuarioBo = new UsuarioBO();
try {
    if (isset($_POST['lembra'])) {
        setcookie('usuario', $_POST['usuario'], time() + 3600 * 24, "/");
    } else {
        setcookie('usuario', $_POST['usuario'], time() - 10, "/");
    }
    $_SESSION['usuario'] = serialize($usuarioBo->login($_POST['usuario'], $_POST['senha']));
    header('Location: ../view/sistema.php');
} catch (LoginException $e) {
    header('Location: ../view/index.php?error=' . $e->getMessage());
}

?>