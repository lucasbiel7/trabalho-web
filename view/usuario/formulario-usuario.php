<?php


?>

<form action="../control/manter-usuario.php" method="post">
    <div class="formulario mb-4">
        <input type="hidden" name="id">
        <div class="field">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
        </div>
        <div class="field">
            <label for="ultimoNome">Último nome</label>
            <input type="text" name="ultimoNome" id="ultimoNome">
        </div>
        <div class="field">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf">
        </div>
        <div class="field">
            <label for="rg">RG</label>
            <input type="text" name="rg" id="rg">
        </div>
        <div class="field">
            <label for="dataNascimento">Data de nascimento</label>
            <input type="date" name="dataNascimento" id="dataNascimento">
        </div>
        <div class="field">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco">
        </div>
        <div class="field">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="field">
            <label for="login">Login</label>
            <input type="text" name="login" id="login">
        </div>
        <div class="field">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha">
        </div>
        <div class="field">
            <button type="submit">Cadastrar</button>
        </div>
    </div>
</form>
