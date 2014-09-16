<?php namespace Calculator\Operators; 

class Add implements OperatorInterface {

    /**
     * Execute add opeartion
     *
     * @param  int $total
     * @param  int $operand
     * @return int
     */
    public function execute($total, $operand)
    {
        return $total + $operand;
    }

}