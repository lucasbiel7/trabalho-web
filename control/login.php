<?php
session_start();
require_once __DIR__ . '/bo/UsuarioBO.class.php';
$usuarioBo = new UsuarioBO();
try {
    /**
     * Cookie para usuário
     */
    if (isset($_POST['lembra'])) {
        setcookie('usuario', $_POST['usuario'], time() + 3600 * 24, "/");
    } else {
        setcookie('usuario', $_POST['usuario'], time() - 10, "/");
    }
    /**
     * Login do usuário
     */
    $_SESSION['usuario'] = serialize($usuarioBo->login($_POST['usuario'], $_POST['senha']));
    header('Location: ../view/sistema.php');
} catch (LoginException $e) {
    header('Location: ../view/index.php?error=' . $e->getMessage());
}

?>