<?php namespace Calculator;

use Calculator\Operators\OperatorInterface;

class Calculator  {

    protected $total = 0;

    function __construct($total = null)
    {
        $this->total = $total;
    }

    /**
     * Executes operetion sent 
     *
     * @param  [type] $operand
     * @param  OperatorInterface $operator
     * @return [type]
     */
    public function calculate($operand, OperatorInterface $operator)
    {
        $this->total = $operator->execute($this->total, $operand);

        return $this->total;
    }

}