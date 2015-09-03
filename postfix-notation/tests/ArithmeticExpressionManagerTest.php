<?php 

class ArithmeticExpressionManagerTest extends PHPUnit_Framework_TestCase {

    protected $expressionManager;

    public function setUp()
    {
        $this->expressionManager = new ArithmeticExpressionManager;
    }

    public function test_if_is_an_operator()
    {
        $expression = '+';

        $this->assertEquals('+', $this->expressionManager->isOperator($expression)[0]);
    }

    public function test_is_not_an_operator()
    {
        $expression = '2';

        $this->assertEquals(false, $this->expressionManager->isOperator($expression));
    }

    public function test_eval_operator_precedence()
    {
        $base = '*';
        $target = '+';

        $result = $this->expressionManager->hasMorePrecedence($base, $target);
        $this->assertEquals(false, $result);

        $result = $this->expressionManager->hasMorePrecedence($target, $base);
        $this->assertEquals(true, $result);
    }
}