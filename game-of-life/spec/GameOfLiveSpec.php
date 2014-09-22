<?php namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameOfLiveSpec extends ObjectBehavior
{
    
    public function let(\Constitution $constitution, \Neighborhood $neighborhood)
    {
        $this->beConstructedWith($constitution, $neighborhood);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('GameOfLive');
    }

    public function it_generates_the_generation_next(\Constitution $constitution, \Neighborhood $neighborhood)
    {
        $constitution->willLive('1,1')->willReturn(true);

        $neighborhood->getMatrixSize()->willReturn(5);

        $this->nextGeneration()->shouldBe(['1,1']);        
    }
}

