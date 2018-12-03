<?php
require_once __DIR__ . '/bo/VeiculoBO.class.php';
if (isset($_GET['id'])) {
    $veiculoBO = new VeiculoBO();
    $veiculoBO->excluir($_GET['id']);
    header('Location: ../view/sistema.php?tela=lv');
} else {
    header('Location: ../view/');
}
?>