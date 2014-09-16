<?php namespace Calculator\Operators;

/**
 * All oparators must implement execute method
 */
interface OperatorInterface {

    public function execute($total, $operand);

}