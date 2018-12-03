<?php

require_once __DIR__ . '/EntityManager.class.php';
require_once __DIR__ . '/../../model/Categoria.class.php';

/**
 * Classe para acessar os dados das categorias
 * 
 * @author Lucas Gabriel de Souza Dutra
 */
class CategoriaDAO extends EntityManager
{
    public function CategoriaDAO()
    {
        parent::EntityManager("categoria", "Categoria");
        $this->fields = array_merge($this->fields, ['descricao' => 'descricao']);
    }
}
?>