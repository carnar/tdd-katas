<?php namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameOfLifeSpec extends ObjectBehavior
{
    
    public function let(\Constitution $constitution, \Neighborhood $neighborhood)
    {
        $this->beConstructedWith($constitution, $neighborhood);

        for ($i=1; $i < 6; $i++) 
        { 
            for ($j=1; $j < 6; $j++) 
            { 
                $constitution->willLive("$i,$j")->willReturn(false);
            }
        }
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('GameOfLife');
    }

    public function it_generates_the_generation_next(\Constitution $constitution, \Neighborhood $neighborhood)
    {
        $constitution->willLive('2,3')->willReturn(true);
        $constitution->willLive('2,4')->willReturn(true);
        $constitution->willLive('3,2')->willReturn(true);
        $constitution->willLive('3,4')->willReturn(true);
        $constitution->willLive('4,4')->willReturn(true);

        $neighborhood->getMatrixSize()->willReturn(5);

        $this->nextGeneration()->shouldBe([
            '2,3',
            '2,4',
            '3,2',
            '3,4',
            '4,4'
        ]);        
    }

    public function it_generates_another_generation_next(\Constitution $constitution, \Neighborhood $neighborhood)
    {
        $constitution->willLive('2,3')->willReturn(true);
        $constitution->willLive('2,4')->willReturn(true);
        $constitution->willLive('3,4')->willReturn(true);
        $constitution->willLive('3,5')->willReturn(true);
        $constitution->willLive('4,3')->willReturn(true);

        $neighborhood->getMatrixSize()->willReturn(5);

        $this->nextGeneration()->shouldBe([
            '2,3',
            '2,4',
            '3,4',
            '3,5',
            '4,3'
        ]);        
    }

}

