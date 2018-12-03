<?php

require_once __DIR__ . '/../dao/CategoriaDAO.class.php';
/**
 * Classe para gerenciar categorias
 * 
 * @author Lucas Gabriel de Souza Dutra
 */
class CategoriaBO
{
    private $categoriaDAO;

    public function CategoriaBO()
    {
        $this->categoriaDAO = new CategoriaDAO();
    }

    public function getCategorias()
    {
        return $this->categoriaDAO->getAll();
    }
}
?>