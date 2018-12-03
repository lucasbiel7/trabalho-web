<?php
require_once __DIR__ . '/../dao/UsuarioDAO.class.php';
require_once __DIR__ . '/../excecoes/LoginException.class.php';

/**
 * 
 * Classe para negócio de usuário
 * 
 * @author Lucas Gabriel de Souza Dutra
 */
class UsuarioBO
{
    /**
     * Método para realizar o login do 
     * usuário na base de dados
     * 
     */
    function login($usuario, $senha)
    {
        $pessoaDAO = new UsuarioDAO();
        $pessoas = $pessoaDAO->getAllUsingFilter(['login' => $usuario, 'senha' => $senha]);
        if (empty($usuario)) {
            throw new LoginException('Usuário vazio');
        }
        if (empty($senha)) {
            throw new LoginException('Senha vazia');
        }
        if (empty($pessoas)) {
            throw new LoginException('Usuário e senha incorretos');
        }
        return $pessoas[0];
    }
}

?>