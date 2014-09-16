<?php namespace Calculator\Operators;

class Substract implements OperatorInterface {

    /**
     * Execute substract operation
     *
     * @param  int $total
     * @param  int $operand
     * @return int
     */
    public function execute($total, $operand)
    {
        return $total - $operand;
    }

}