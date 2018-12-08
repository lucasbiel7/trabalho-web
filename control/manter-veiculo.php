<?php
session_start();
require_once __DIR__ . '/bo/VeiculoBO.class.php';
$veiculoBO = new VeiculoBO();
$veiculo = new Veiculo(
    $_POST['nome'],
    $_POST['modelo'],
    $_POST['categoria'],
    $_POST['quantidade'],
    $_POST['valor']
);
$veiculo->setId($_POST['id']);
try {
    $veiculoBO->cadastrarAtualizar($veiculo);

    header('Location: ../view/sistema.php');
} catch (CadastroVeiculoException $e) {
    setcookie('veiculo', serialize($veiculo), time() + 10, '/');
    header('Location: ../view/sistema.php?tela=cv&error=' . $e->getMessage());
}
?>