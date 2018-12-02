<?php
require_once '../control/bo/CategoriaBO.class.php';
$categoriaBO = new CategoriaBO();
$categorias = $categoriaBO->getCategorias();
?>
<form action="../control/manter-veiculo.php" method="post">
    <div class="formulario">
        <div class="field">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo">
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
    </div>    
</form>