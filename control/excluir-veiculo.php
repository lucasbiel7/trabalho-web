<?php
require_once __DIR__ . '/bo/VeiculoBO.class.php';
if (isset($_GET['id'])) {
    $veiculoBO = new VeiculoBO();
    $veiculoBO->excluir($_GET['id']);
} else {
    header('Location: ../view/');
}
?>