<?php 

use Calculator\Calculator;
use Calculator\Operators\Add;
use Calculator\Operators\Multiply;
use Calculator\Operators\Division;
use Calculator\Operators\Substract;

class CalculatorTest extends \PHPUnit_Framework_TestCase {

    public function test_if_all_ok()
    {
        $this->assertTrue(true);
        $this->assertFalse(false);
    }

    public function test_add_two_operands()
    {
        $calc = new Calculator;

        $this->assertEquals(2, $calc->calculate(2, new Add()));
        $this->assertEquals(14, $calc->calculate(12, new Add()));
        $this->assertEquals(14, $calc->calculate(0, new Add()));

    }

    public function test_when_substract_an_operad()
    {
        $calc = new Calculator(10);

        $this->assertEquals(8, $calc->calculate(2, new Substract())); 
        $this->assertEquals(5, $calc->calculate(3, new Substract())); 
        $this->assertEquals(0, $calc->calculate(5, new Substract())); 
    }

    public function test_calculate_product()
    {
        $calc = new Calculator(5);

        $this->assertEquals(10, $calc->calculate(2, new Multiply()));
        $this->assertEquals(50, $calc->calculate(5, new Multiply()));
    }
    
    public function test_calculate_divide_by_integer()
    {
        $calc = new Calculator(10);

        $this->assertEquals(5, $calc->calculate(2, new Division()));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_calculate_divide_by_zero()
    {
        $calc = new Calculator(10);

        $calc->calculate(0, new Division());        
    }

    public function test_add_feature()
    {
        $add = new Add();
        $this->assertEquals(5, $add->execute(2, 3));
    }

    public function test_substract_feature()
    {
        $add = new Substract();
        $this->assertEquals(2, $add->execute(4, 2));
    }

    public function test_multiply_feature()
    {
        $add = new Multiply();
        $this->assertEquals(50, $add->execute(5, 10));
    }

    public function test_division_feature()
    {
        $add = new Division();
        $this->assertEquals(5, $add->execute(10, 2));
    }

}