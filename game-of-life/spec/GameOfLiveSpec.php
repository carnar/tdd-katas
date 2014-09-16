<?php namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameOfLiveSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('GameOfLive');
    }

    public function it_returns_3_neighbourds()
    {
        $population = [
            '4,2',
            '2,3',
            '3,3',
            '3,4',
            '4,4'
        ];
        $this->countNeighbourds($population, '3,4')->shouldBe(3);
    }

    public function it_returns_4_neighbourds()
    {
        $population = [
            '4,2',
            '2,3',
            '3,3',
            '3,4',
            '4,4'
        ];
        $this->countNeighbourds($population, '3,3')->shouldBe(4);        
    }

    public function it_returns_zero_neighbourds_when_this_is_in_the_edge()
    {
        $population = [
            '4,2',
            '2,3',
            '3,3',
            '3,4',
            '4,4',
        ];
        $this->countNeighbourds($population, '5,1')->shouldBe(0);                
    }

    public function it_returns_one_neighbourd()
    {
        $population = [
            '4,2',
            '2,3',
            '3,3',
            '3,4',
            '4,4',
        ];
        $this->countNeighbourds($population, '4,2')->shouldBe(1);                
    }

    public function it_returns_member_must_die_with_only_1_neighbourd()
    {
        $population = [
            '4,2',
            '2,3',
            '3,3',
            '3,4',
            '4,4',
        ];

        $this->willDie($population, '4,2')->shouldBe(true);                        
    }

    public function it_returns_member_must_not_die_with_3_neighbourds()
    {
        $population = [
            '4,2',
            '2,3',
            '3,3',
            '3,4',
            '4,4',
        ];

        $this->willDie($population, '3,4')->shouldBe(false);                        
    }

    public function it_returns_member_must_die_with_4_neighbourds()
    {
        $population = [
            '4,2',
            '2,3',
            '3,3',
            '3,4',
            '4,4',
        ];

        $this->willDie($population, '3,3')->shouldBe(true);                        
    }

}

