<?php
session_start();
include 'template/header.php';
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
include 'template/menu.php';
if (isset($_GET['tela'])) {
    switch ($_GET['tela']) {
        case 'cv':
            include 'veiculo/manter.php';
            break;
        case 'lv':
            include 'veiculo/listar.php';
            break;
        case 'mu':
            include 'usuario/formulario-usuario.php';
            break;
    }
}
?>

<?php
include 'template/footer.php';
?>