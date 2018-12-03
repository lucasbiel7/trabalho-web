<?php
require_once '../control/bo/CategoriaBO.class.php';
$categoriaBO = new CategoriaBO();
$categorias = $categoriaBO->getCategorias();
?>
<form action="../control/manter-veiculo.php" method="post">
    <div class="formulario">
        <input type="text" name="id" id="id" hidden>
        <div class="field">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" placeholder="Digite o modelo">
        </div>
        <div class="field">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome">
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
            <input type="number" name="quantidade" id="quantidade" placeholder="Digite a quantidade">
        </div>
        <div class="field">
            <label for="valor">Valor</label>
            <input type="number" name="valor" id="valor" placeholder="Digite o valor">
        </div>
        <div class="field">
            <button type="submit">Cadastrar</button>
            <button type="reset">Limpar</button>
        </div>
    </div>    
</form>