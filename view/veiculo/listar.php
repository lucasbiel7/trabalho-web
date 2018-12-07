<?php
require_once __DIR__ . '/../../control/bo/VeiculoBO.class.php';
require_once __DIR__ . '/../../control/bo/CategoriaBO.class.php';
$categoriaBO = new CategoriaBO();
$veiculoBO = new VeiculoBO();
$veiculos = $veiculoBO->getTodos();
?>

<table>
    <thead>
        <th>Nome</th>
        <th>Modelo</th>
        <th>Categoria</th>
        <th>Quantidade</th>
        <th>Valor</th>
        <th>-</th>
        <th>-</th>
    </thead>
    <tbody>
    <?php
    foreach ($veiculos as $veiculo) {
        $categoria = $categoriaBO->pegarPorId($veiculo->getCategoria());
        ?>
        <tr>
            <td><?= $veiculo->getNome() ?></td>
            <td><?= $veiculo->getModelo() ?></td>
            <td><?= $categoria->getDescricao() ?></td>
            <td><?= $veiculo->getQuantidade() ?></td>
            <td><?= 'R$ ' . str_replace('.', ',', $veiculo->getValor()) ?></td>
            <td><a href="sistema.php?tela=cv&id=<?= $veiculo->getId() ?>">Editar</a></td>
            <td><a href="../control/excluir-veiculo.php?id=<?= $veiculo->getId() ?>">Excluir</a></td>
        </tr>
    <?php

}
?>
        

        
    </tbody
</table>