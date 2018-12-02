<?php
require_once 'Entity.class.php';
/**
 * 
 * Classe pessoa
 * 
 */
class Pessoa extends Entity
{
    private $nome;
    private $ultimoNome;
    private $cpf;
    private $rg;
    private $dataNascimento;
    private $endereco;

    public function Pessoa($nome = null, $ultimoNome = null, $cpf = null, $rg = null, $dataNascimento = null, $endereco = null)
    {
        $this->nome = $nome;
        $this->ultimoNome = $ultimoNome;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->dataNascimento = $dataNascimento;
        $this->endereco = $endereco;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of ultimoNome
     */
    public function getUltimoNome()
    {
        return $this->ultimoNome;
    }

    /**
     * Set the value of ultimoNome
     *
     * @return  self
     */
    public function setUltimoNome($ultimoNome)
    {
        $this->ultimoNome = $ultimoNome;

        return $this;
    }

    /**
     * Get the value of cpf
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of rg
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * Set the value of rg
     *
     * @return  self
     */
    public function setRg($rg)
    {
        $this->rg = $rg;

        return $this;
    }

    /**
     * Get the value of dataNascimento
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * Set the value of dataNascimento
     *
     * @return  self
     */
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * Get the value of endereco
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @return  self
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

}
?>