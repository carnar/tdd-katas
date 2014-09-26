<?php 

class PostfixStackTest extends PHPUnit_Framework_TestCase {

    protected $stack;

    public function setUp()
    {
        $this->stack = new PostfixStack();
    }

    public function test_count_stack_members()
    {
        $num = $this->stack->count();

        $this->assertEquals(0, $num);
    }

    public function test_add_object_to_stack()
    {
        $num = $this->stack->push(5);
        $this->assertEquals(1, $num);

        $num = $this->stack->push(2);
        $this->assertEquals(2, $num);
    }
    
}