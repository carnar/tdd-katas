<?php

use DottieNumber\DottieNumber;

class DottieNumberTest extends PHPUnit_Framework_TestCase 
{
    protected $dottieNumber;

    protected $number;

    public function setUp()
    {
        $this->dottieNumber = new DottieNumber();
        $this->number = 1;
    }

    /**
     * @test
     */
    public function it_calculates_first_value_for_number_1_and_6_decimals()
    {
        $result = $this->dottieNumber->calculate($this->number, 1);
        $expected = number_format(0.540302, 6);

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_calculates_second_value_for_number_1_and_6_decimals()
    {
        $result = $this->dottieNumber->calculate($this->number, 2);
        $expected = number_format(0.857553, 6);

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_calculates_third_value_for_number_1_and_6_decimals()
    {
        $result = $this->dottieNumber->calculate($this->number, 3);
        $expected = number_format(0.654289, 6);

        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     */
    public function it_calculates_dottie_number_iterating_maximun_100_times()
    {
        $result = $this->dottieNumber->calculate($this->number);
        $expected = number_format(0.739085, 6);

        $this->assertEquals($expected, $result);
    }
}