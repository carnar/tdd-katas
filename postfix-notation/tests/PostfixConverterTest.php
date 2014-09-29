<?php 

class PostfixConverterTest extends PHPUnit_Framework_TestCase {

    protected $converter;

    public function setUp()
    {
        $this->converter = new PostfixConverter;
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

    public function test_convert_add_operation()
    {
        $postfix = $this->converter->convert('2+3');

        $this->assertEquals('2 3 +', $postfix);
    }
    
}