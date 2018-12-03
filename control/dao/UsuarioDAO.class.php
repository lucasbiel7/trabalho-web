<?php
require_once __DIR__ . "/PessoaDAO.class.php";
require_once __DIR__ . '/../../model/Usuario.class.php';

/**
 * Classe para gerenciar os usuários da aplicação
 * 
 * @author Lucas Gabriel de Souza Dutra
 * 
 */
class UsuarioDAO extends PessoaDAO
{
    public function UsuarioDAO($table = 'pessoa', $classe = 'Usuario')
    {
        parent::PessoaDAO($table, $classe);
        $this->fields = array_merge($this->fields, [
            "login" => "login",
            "senha" => "email",
            "email" => "senha"
        ]);
    }
}
?>