<?php
require_once 'Pessoa.class.php';

class Usuario extends Pessoa
{
    private $login;
    private $senha;
    private $email;

    public function Usuario(
        $nome = null,
        $ultimoNome = null,
        $cpf = null,
        $rg = null,
        $dataNAscimento = null,
        $endereco = null,
        $login = null,
        $senha = null,
        $email = null
    ) {
        parent::Pessoa($nome, $ultimoNome, $cpf, $rg, $dataNAscimento, $endereco);
        $this->login = $login;
        $this->senha = $senha;
        $this->email = $email;
    }

    /**
     * Get the value of login
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
?>