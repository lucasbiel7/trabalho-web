<?php
require_once 'EntityManager.class.php';
/**
 * 
 * Classe para gerenciar os dados do veículo
 * 
 */
class VeiculoDAO extends EntityManager
{

    public function VeiculoDAO()
    {
        parent::DataSource('veiculo');
    }
}
?>