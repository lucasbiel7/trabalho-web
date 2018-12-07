<?php

require_once __DIR__ . '/DataSource.class.php';
require_once __DIR__ . '/../../model/Entity.class.php';

/**
 * 
 * Classe generica para realizar operações básicas no 
 * banco de dados
 * 
 * @author Lucas Gabriel de Souza Dutra
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
        $this->fields = ["id" => "id"];
    }

    public function getAll()
    {
        $query = "select * from $this->table";
        return $this->asListObject(parent::getConexao()->query($query));
    }

    public function pegarPorId($id)
    {
        $result = $this->getAllUsingFilter(['id' => $id]);
        if (count($result) > 1) {
            throw new NaoUnicoResultadoException('Parece que há mais registros com mesmo id');
        }
        if (empty($result)) {
            throw new SemResultadoException('Não foi possível encontrar o registro');
        }
        return $result[0];
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
    protected function getMethodSetter($field)
    {
        return 'set' . strtoupper(substr($field, 0, 1)) . substr($field, 1);
    }

    /**
     * 
     * Recupera o método GET de um atributo
     * 
     */
    protected function getMethodGetter($field)
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

    public function merge(Entity $entidade)
    {
        if (empty($entidade->getId())) {
            return $this->insert($entidade);
        }
        return $this->update($entidade);
    }

    public function update(Entity $entidade)
    {
        $atribuicoes = "";
        foreach ($this->fields as $key => $value) {
            if (!empty($atribuicoes)) {
                $atribuicoes .= ",";
            }
            if ($key != 'id') {
                $getter = $this->getMethodGetter($key);
                $atribuicoes .= "$key = '" . $entidade->$getter() . "'";
            }
        }
        $query = "update $this->table set $atribuicoes where id =" . $entidade->getId();
        $statement = $this->getConexao()->prepare($query);
        return $statement->execute();
    }

    public function excluir(Entity $object)
    {
        $query = "delete from $this->table where id = " . $object->getId();
        $statement = $this->getConexao()->prepare($query);
        return $statement->execute();
    }

}
?>