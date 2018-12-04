<?php

require_once __DIR__ . '/../dao/VeiculoDAO.class.php';
require_once __DIR__ . '/../excecoes/CadastroVeiculoException.class.php';

/**
 * Classe para gerenciar os Veículos
 * 
 * @author Lucas Gabriel de Souza Dutra
 * 
 */
class VeiculoBO
{
    private $veiculoDAO;

    public function VeiculoBO()
    {
        $this->veiculoDAO = new VeiculoDAO();
    }

    public function cadastrarAtualizar(Veiculo $veiculo)
    {
        if (empty($veiculo->getModelo())) {
            throw new CadastroVeiculoException('Modelo não pode ser vazio!');
        }
        if (empty($veiculo->getCategoria())) {
            throw new CadastroVeiculoException('Categoria não pode ser vazio!');
        }
        if (empty($veiculo->getNome())) {
            throw new CadastroVeiculoException('Nome não pode ser vazio!');
        }
        if (empty($veiculo->getQuantidade())) {
            throw new CadastroVeiculoException('A quantidade deve ser preenchida!');
        }
        if (empty($veiculo->getValor())) {
            throw new CadastroVeiculoException('O valor deve ser preenchida!');
        }
        $this->veiculoDAO->merge($veiculo);
    }

    public function getTodos()
    {
        return $this->veiculoDAO->getAll();
    }

    public function excluir($id)
    {
        $this->veiculoDAO->excluir($this->veiculoDAO->pegarPorId($id));
    }

    public function pegarPorId($id)
    {
        return $this->veiculoDAO->pegarPorId($id);
    }
}
?>