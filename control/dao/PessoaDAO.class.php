<?php
require_once __DIR__ . "/EntityManager.class.php";
require_once __DIR__ . '/../../model/Pessoa.class.php';

class PessoaDAO extends EntityManager
{
    public function PessoaDAO($table = 'pessoa', $classe = 'Pessoa')
    {
        parent::EntityManager($table, $classe);
        $this->fields = array_merge($this->fields, [
            "nome" => "getNome",
            "ultimoNome" => "getUltimoNome",
            "cpf" => "getCpf",
            "rg" => "getRg",
            "dataNascimento" => "getDataNascimento",
            "endereco" => "getEndereco"
        ]);
    }

}
?>