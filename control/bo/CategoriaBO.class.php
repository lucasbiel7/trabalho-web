<?php

require_once __DIR__ . '/../dao/CategoriaDAO.class.php';

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