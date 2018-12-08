<?php
require_once __DIR__ . '/../../model/Usuario.class.php';
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
}
?>
<nav>
    <ul>
        <li><a href="?tela=cv">Cadastrar veículo</a></li>
        <li><a href="?tela=lv">Listar veículo</a></li>
        
    </ul>
    <ul class="usuario">
        <li>
            <a href="?tela=mu">
                <?= isset($usuario) ? ($usuario->getNome() . " " . $usuario->getUltimoNome()) : '' ?>
            </a>
        </li>
        <li><a href="../control/sair.php">Sair</a><li>
    </ul>
</nav>