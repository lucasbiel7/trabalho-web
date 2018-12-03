<?php

require_once __DIR__ . '/EntityManager.class.php';
require_once __DIR__ . '/../../model/Veiculo.class.php';
/**
 * Classe para gerenciar os dados do veículo
 * 
 * 
 * @author Lucas Gabriel de Souza Dutra
 */
class VeiculoDAO extends EntityManager
{

    public function VeiculoDAO()
    {
        parent::EntityManager('veiculo', 'Veiculo');
        $this->fields = array_merge(
            $this->fields,
            [
                "modelo" => "modelo"
            ]
        );
    }
}
?>