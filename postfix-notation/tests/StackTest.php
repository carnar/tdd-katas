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

    public function test_pushing_object_to_stack()
    {
        $num = $this->stack->push(5);
        $this->assertEquals(1, $num);

        $num = $this->stack->push(2);
        $this->assertEquals(2, $num);
    }
    
    public function test_pop_out_last_object_in_the_stack()
    {
        $this->stack->push(5);
        $this->stack->push(2);
        
        $number = $this->stack->pop();
        $this->assertEquals(2, $number);

        $this->stack->push(5);
        $number = $this->stack->pop();

        $this->assertEquals(5, $number);
    }

    public function test_release_stack()
    {
        $this->stack->push(5);
        $this->stack->push(2);

        $objects = $this->stack->release();
        
        $this->assertEquals(0, $this->stack->count());
        $this->assertEquals([5,2], $objects);
    }
}