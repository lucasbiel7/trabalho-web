<?php
require_once __DIR__ . '/../../model/Usuario.class.php';
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
}
?>
<nav>
    <ul>
        <li><a href="sistema.php?tela=cv">Cadastrar veículo</a></li>
        <li><a href="sistema.php?tela=lv">Listar veículo</a></li>
        
    </ul>
    <ul class="usuario">
        <li>
            <?= isset($usuario) ? ($usuario->getNome() . " " . $usuario->getUltimoNome()) : '' ?>
        </li>
        <li><a href="../control/sair.php">Sair</a><li>
    </ul>
</nav>