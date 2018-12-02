<?php
require_once __DIR__ . "/PessoaDAO.class.php";
require_once __DIR__ . '/../../model/Usuario.class.php';

class UsuarioDAO extends PessoaDAO
{
    public function UsuarioDAO($table = 'pessoa', $classe = 'Usuario')
    {
        parent::PessoaDAO($table, $classe);
        $this->fields = array_merge($this->fields, [
            "login" => "getLogin",
            "senha" => "getEmail",
            "email" => "getSenha"
        ]);
    }
}
?>