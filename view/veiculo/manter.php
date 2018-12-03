<?php
require_once __DIR__ . '/../../control/bo/CategoriaBO.class.php';
require_once __DIR__ . '/../../model/Veiculo.class.php';

$categoriaBO = new CategoriaBO();
$categorias = $categoriaBO->getCategorias();
if (isset($_COOKIE['veiculo'])) {
    $veiculo = unserialize($_COOKIE['veiculo']);
    echo $veiculo->getNome();
}
?>
<form action="../control/manter-veiculo.php" method="post">
    <div class="formulario">
        <input type="text" name="id" id="id" hidden>
        <div class="field">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" placeholder="Digite o modelo" 
            value="<?= isset($veiculo) ? $veiculo->getModelo() : '' ?>">
        </div>
        <div class="field">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome"
            value="<?= isset($veiculo) ? $veiculo->getNome() : '' ?>"
            >
        </div>
        <div class="field">
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria">
                <?php
                foreach ($categorias as $categoria) {
                    echo "<option value=" . $categoria->getId() . ">" . $categoria->getDescricao() . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="field">
            <label for="Quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" placeholder="Digite a quantidade"
            value="<?= isset($veiculo) ? $veiculo->getQuantidade() : '' ?>"/>
        </div>
        <div class="field">
            <label for="valor">Valor</label>
            <input type="number" name="valor" id="valor" placeholder="Digite o valor" 
                value="<?= isset($veiculo) ? $veiculo->getValor() : ''; ?>">
        </div>
        <?= isset($_GET['error']) ? '<font color="red">' . $_GET['error'] . '</font>' : '' ?>
        <div class="field">
            <button type="submit">Cadastrar</button>
            <button type="reset">Limpar</button>
        </div>
    </div>    
</form>