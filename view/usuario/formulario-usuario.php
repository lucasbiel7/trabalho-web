<?php

require_once __DIR__ . '/../../control/bo/UsuarioBO.class.php';
$usuario = new Usuario();
if (isset($_COOKIE['manterUsuario'])) {
    $usuario = unserialize($_COOKIE['manterUsuario']);
}
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
}

?>
<form action="../control/manter-usuario.php" method="post">
    <div class="formulario mb-4">
        <input type="hidden" name="id" value="<?= isset($usuario) ? $usuario->getId() : '' ?>">
        <div class="field">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?= isset($usuario) ? $usuario->getNome() : '' ?>">
        </div>
        <div class="field">
            <label for="ultimoNome">Último nome</label>
            <input type="text" name="ultimoNome" id="ultimoNome" value="<?= isset($usuario) ? $usuario->getUltimoNome() : '' ?>">
        </div>
        <div class="field">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" value="<?= isset($usuario) ? $usuario->getCpf() : '' ?>">
        </div>
        <div class="field">
            <label for="rg">RG</label>
            <input type="text" name="rg" id="rg" value="<?= isset($usuario) ? $usuario->getRg() : '' ?>">
        </div>
        <div class="field">
            <label for="dataNascimento">Data de nascimento</label>
            <input type="date" name="dataNascimento" id="dataNascimento" value="<?= isset($usuario) ? $usuario->getDataNascimento() : '' ?>">
        </div>
        <div class="field">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" value="<?= isset($usuario) ? $usuario->getEndereco() : '' ?>">
        </div>
        <div class="field">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="<?= isset($usuario) ? $usuario->getEmail() : '' ?>">
        </div>
        <div class="field">
            <label for="login">Login</label>
            <input type="text" name="login" id="login" value="<?= isset($usuario) ? $usuario->getLogin() : '' ?>">
        </div>
        <div class="field">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha">
        </div>
        <?= isset($_GET['error']) ? '<font color="red">' . $_GET['error'] . '</font>' : '' ?>
        <div class="field">
            <button type="submit">Cadastrar</button>
        </div>
    </div>
</form>
