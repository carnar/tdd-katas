<?php 

use AlphabeticOrder\WordChecker;

class WordCheckerTest extends PHPUnit_Framework_TestCase 
{
    protected $checker;

    public function setUp()
    {
        $this->checker = new WordChecker;
    }

    public function test_if_everything_is_ok()
    {
        $this->assertTrue(true);
    }

    public function test_checks_if_house_is_in_order()
    {
        $word = 'house';

        $result = $this->checker->isSorted($word);

        $this->assertFalse($result);
    }

    public function test_checks_if_abc_is_sorted()
    {
        $word = 'abc';

        $result = $this->checker->isSorted($word);

        $this->assertTrue($result);
        
    }

    public function test_checks_if_cell_is_sorted()
    {
        $word = 'cell';

        $result = $this->checker->isSorted($word);

        $this->assertTrue($result);
    }

    public function test_checks_if_begins_is_sorted()
    {
        $word = "begins";

        $result = $this->checker->isSorted($word);

        $this->assertTrue($result);
    }

    public function test_checks_if_carnar_in_not_sorted()
    {
        $word = "carnar";

        $result = $this->checker->isSorted($word);

        $this->assertFalse($result);        
    }
}