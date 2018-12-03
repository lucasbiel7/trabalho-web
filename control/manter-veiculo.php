<?php
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
    $veiculoBO->cadastrar($veiculo);
} catch (CadastroVeiculoException $e) {
    setcookie('veiculo', $veiculo, time() + 10, '/');
    header('Location: ../view/sistema.php?tela=cv&error=' . $e->getMessage());
}
?>