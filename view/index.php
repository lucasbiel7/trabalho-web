<?php
include 'template/header.php';
?>
    <section class="pagina-inicial">
        <form action="../control/login.php" method="post">
            <div class="formulario">
                <div class="field">
                    <label for="usuario">Usuário</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Digite o seu usuário"
                    value ="<?= isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : '' ?>">
                </div>
                <div class="field">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite a sua senha">
                </div>
                <div class="field">
                    <input type="checkbox" name="lembra" id="lembra" 
                    <?= isset($_COOKIE['usuario']) ? 'checked' : '' ?>
                    >Lembrar-me 
                </div>
                <div class="field">
                    <button type="submit">Entrar</button>
                </div>
                <?= isset($_GET['error']) ? "<font color='red'>" . $_GET['error'] . "</font>" : "" ?>
            </div>
            
        </form>
    </section>
<?php
include 'template/footer.php';
?>
