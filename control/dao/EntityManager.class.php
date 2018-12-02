<?php

require_once __DIR__ . '/DataSource.class.php';
require_once __DIR__ . '/../../model/Entity.class.php';

/**
 * 
 * Classe generica para realizar operações básicas no 
 * banco de dados
 * 
 */
class EntityManager extends DataSource
{

    protected $table;
    protected $fields;
    protected $classe;

    public function EntityManager($table, $classe)
    {
        parent::DataSource();
        $this->table = $table;
        $this->classe = $classe;
        $this->fields = ["id" => "getId"];
    }

    public function getAll()
    {
        $query = "select * from $this->table";
        return $this->asListObject(parent::getConexao()->query($query));
    }

    public function getAllUsingFilter($filtros, $operador = "and")
    {
        $query = "select * from $this->table ";
        $filtro = "";
        foreach ($filtros as $key => $value) {
            if (!empty($filtro)) {
                $filtro .= " $operador ";
            } else {
                $filtro .= " where ";
            }
            $filtro .= "$key = '$value'";
        }
        $query .= $filtro;
        return $this->asListObject(parent::getConexao()->query($query));
    }

    /**
     * 
     * Converte dado para lista de objetos
     * 
     */
    function asListObject($result)
    {
        $lista = array();
        while ($linha = $result->fetch(PDO::FETCH_OBJ)) {
            $lista[] = $this->asObject($linha);
        }
        return $lista;
    }

    /**
     * 
     * Converte cada registro para objeto
     * 
     */
    function asObject($linha)
    {
        $objeto = new $this->classe();
        foreach ($this->fields as $key => $value) {
            $setter = $this->getMethodSetter($key);
            $objeto->$setter($linha->$key);
        }
        return $objeto;
    }

    /**
     * 
     * Recupera o método SET de um atributo
     * 
     */
    function getMethodSetter($field)
    {
        return 'set' . strtoupper(substr($field, 0, 1)) . substr($field, 1);
    }

    /**
     * 
     * Recupera o método GET de um atributo
     * 
     */
    function getMethodGetter($field)
    {
        return 'get' . strtoupper(substr($field, 0, 1)) . substr($field, 1);
    }

    /**
     * 
     * Inseri um objeto que seja uma entidade 
     * 
     */
    public function insert(Entity $object)
    {
        $campos = "";
        $values = "";
        foreach ($this->fields as $key => $value) {
            //Campos que serão inseridos
            if (!empty($campos)) {
                $campos .= ',';
            }
            $campos .= $key;
            //Valores que serão inseridos
            if (!empty($values)) {
                $values .= ',';
            }
            $get = $this->getMethodGetter($key);
            $valor = $object->$get();
            if (empty($valor)) {
                $values .= "null";
            } else {
                $values .= "'" . $valor . "'";
            }
        }
        $query = "insert into $this->table ($campos) values ($values);";
        $statement = $this->getConexao()->prepare($query);
        return $statement->execute();
    }

}
?>