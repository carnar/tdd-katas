<?php namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NeighborhoodSpec extends ObjectBehavior
{

    public function let()
    {
        $population = [
            '4,2',
            '2,3',
            '3,3',
            '3,4',
            '4,4'
        ];

        $matrixSize = 5;

        $this->beConstructedWith($population, $matrixSize);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Neighborhood');
    }

    public function it_returns_if_a_member_is_alive()
    {
        $this->isAlive('2,3')->shouldBe(true);
    }

    public function it_returns_3_neighbors()
    {
        $member = '2,4';
        $this->countNeighbors($member)->shouldBe(3);
    }

    public function it_returns_2_neighbors()
    {
        $member = '2,2';
        $this->countNeighbors($member)->shouldBe(2);
    }
}
