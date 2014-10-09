<?php 

class PostfixConverterTest extends PHPUnit_Framework_TestCase {

    protected $converter;

    public function setUp()
    {
        $this->converter = new PostfixConverter(new PostfixStack);
    }

    public function test_if_all_are_ok()
    {
        $this->assertTrue(true);
    }

    public function test_converting_single_number()
    {
        $postfix = $this->converter->convert('5');

        $this->assertEquals('5', $postfix);
    }

    public function test_if_is_an_operator()
    {
        $expression = '+2';

        $this->assertEquals('+', $this->converter->nextIsOperator($expression)[0]);
    }

    public function test_convert_add_operation()
    {
        $postfix = $this->converter->convert('2+3');

        $this->assertEquals('2 3 +', $postfix);
    }

    public function test_convert_dual_operation()
    {
        $postfix = $this->converter->convert('2+3-1');

        $this->assertEquals('2 3 + 1 -', $postfix);
    }

    public function test_complex_add_and_substract_operation()
    {
        
        $postfix = $this->converter->convert('2+3-1+20-2-2');

        $this->assertEquals('2 3 + 1 - 20 + 2 - 2 -', $postfix);
    }

    public function test_operation_with_no_reorder_operators_require()
    {
        $postfix = $this->converter->convert('2*3+4');

        $this->assertEquals('2 3 * 4 +', $postfix);        
    }

    public function test_operation_reordering_operators_for_precedence()
    {
        $postfix = $this->converter->convert('2+3*4');

        $this->assertEquals('2 3 4 * +', $postfix);
    }

    public function test_eval_operator_precedence()
    {
        $base = '*';
        $target = '+';

        $result = $this->converter->hasMorePrecedence($base, $target);
        $this->assertEquals(false, $result);

        $result = $this->converter->hasMorePrecedence($target, $base);
        $this->assertEquals(true, $result);
    }

}

