<?php 
class Filter
{
    private $field;
    private $operator;
    private $value;

    public function Filter($field, $operator, $value)
    {
        $this->field = $field;
        $this->operator = $operator;
        $this->value = $value;
    }






    /**
     * Get the value of field
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set the value of field
     *
     * @return  self
     */
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Get the value of operator
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Set the value of operator
     *
     * @return  self
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * Get the value of value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}

?>