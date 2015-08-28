<?php 

use FizzBuzz\FizzBuzz;

class FizzBuzzTest extends PHPUnit_Framework_TestCase 
{
    protected $fizzbuzz;

    public function setUp()
    {
         $this->fizzbuzz = new FizzBuzz;
    }
    /**
      * @test
      */
     public function it_gets_the_fizzbuzz_value_of_1()
     {
         $number = 1;
         $expected = 1;

         $result = $this->fizzbuzz->get($number);

         $this->assertEquals($expected, $result);
     } 

     /**
      * @test
      */
     public function it_gets_the_fizzbuzz_value_of_2()
     {
         $number = 2;
         $expected = 2;

         $result = $this->fizzbuzz->get($number);

         $this->assertEquals($expected, $result);
     }

    /**
      * @test
      */
     public function it_gets_the_fizzbuzz_value_of_3()
     {
         $number = 3;
         $expected = 'fizz';

         $result = $this->fizzbuzz->get($number);

         $this->assertEquals($expected, $result);
     }

     /**
      * @test
      */
     public function it_gets_the_fizzbuzz_value_of_4()
     {
         $number = 4;
         $expected = 4;

         $result = $this->fizzbuzz->get($number);

         $this->assertEquals($expected, $result);
     }

     /**
      * @test
      */
     public function it_gets_the_fizzbuzz_value_of_5()
     {
         $number = 5;
         $expected = 'buzz';

         $result = $this->fizzbuzz->get($number);

         $this->assertEquals($expected, $result);
     }

     /**
      * @test
      */
     public function it_gets_the_fizzbuzz_value_of_6()
     {
         $number = 6;
         $expected = 'fizz';

         $result = $this->fizzbuzz->get($number);

         $this->assertEquals($expected, $result);
     }

     /**
      * @test
      */
     public function it_gets_the_fizzbuzz_value_of_7()
     {
         $number = 7;
         $expected = 7;

         $result = $this->fizzbuzz->get($number);

         $this->assertEquals($expected, $result);
     }

     /**
      * @test
      */
     public function it_gets_the_fizzbuzz_value_of_8()
     {
         $number = 8;
         $expected = 8;

         $result = $this->fizzbuzz->get($number);

         $this->assertEquals($expected, $result);
     }

     /**
      * @test
      */
     public function it_gets_the_fizzbuzz_value_of_9()
     {
         $number = 9;
         $expected = 'fizz';

         $result = $this->fizzbuzz->get($number);

         $this->assertEquals($expected, $result);
     }

     /**
      * @test
      */
     public function it_gets_the_fizzbuzz_value_of_11()
     {
         $number = 11;
         $expected = 11;

         $result = $this->fizzbuzz->get($number);

         $this->assertEquals($expected, $result);
     }

     /**
      * @test
      */
     public function it_gets_the_fizzbuzz_value_of_15()
     {
         $number = 15;
         $expected = 'fizzbuzz';

         $result = $this->fizzbuzz->get($number);

         $this->assertEquals($expected, $result);
     }

     /**
      * @test
      */
     public function it_gets_fizzbuzz_scale_up_to_1()
     {
         $top = 1;
         $expected = '1';

         $result = $this->fizzbuzz->scale($top);

         $this->assertEquals($expected, $result);
     }

     /**
      * @test
      */
     public function it_gets_fizzbuzz_scale_up_to_2()
     {
         $top = 2;
         $expected = '1, 2';

         $result = $this->fizzbuzz->scale($top);

         $this->assertEquals($expected, $result);
     }

      /**
      * @test
      */
     public function it_gets_fizzbuzz_scale_up_to_5()
     {
         $top = 5;
         $expected = '1, 2, fizz, 4, buzz';

         $result = $this->fizzbuzz->scale($top);

         $this->assertEquals($expected, $result);
     }

     /**
      * @test
      */
     public function it_gets_fizzbuzz_scale_up_to_20()
     {
         $top = 20;
         $expected = '1, 2, fizz, 4, buzz, fizz, 7, 8, fizz, buzz, 11, fizz, 13, 14, fizzbuzz, 16, 17, fizz, 19, buzz';

         $result = $this->fizzbuzz->scale($top);

         $this->assertEquals($expected, $result);
     }
}