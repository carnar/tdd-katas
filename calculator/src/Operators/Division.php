<?php namespace Calculator\Operators;

class Division implements OperatorInterface {

    /**
     * Execute Division opeartion
     *
     * @param  int $total
     * @param  int $operand
     * @return float
     */
    public function execute($total, $operand)
    {
        if($operand == 0) throw new \InvalidArgumentException();
        
        return $total / $operand;
    }

}