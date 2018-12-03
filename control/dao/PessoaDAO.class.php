<?php
require_once __DIR__ . "/EntityManager.class.php";
require_once __DIR__ . '/../../model/Pessoa.class.php';
/**
 * Classe para acessar dados das pessoas
 * 
 * @author Lucas Gabriel de Souza Dutra
 * 
 */
class PessoaDAO extends EntityManager
{
    public function PessoaDAO($table = 'pessoa', $classe = 'Pessoa')
    {
        parent::EntityManager($table, $classe);
        $this->fields = array_merge($this->fields, [
            "nome" => "nome",
            "ultimoNome" => "ultimoNome",
            "cpf" => "cpf",
            "rg" => "rg",
            "dataNascimento" => "dataNascimento",
            "endereco" => "endereco"
        ]);
    }

}
?>