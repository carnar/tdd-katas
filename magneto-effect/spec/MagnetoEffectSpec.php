<?php namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MagnetoEffectSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('MagnetoEffect');
    }

    public function let()
    {
        $magnets = [
            '2,4',
            '5,2'
        ];
        $radius = 2;
        $matrixSize = 5;

        $this->beConstructedWith($magnets, $radius, $matrixSize);
    }

    public function it_gets_magnets()
    {
        $this->getMagnets()->shouldBe([
            '2,4',
            '5,2'
        ]);
    }

    public function it_sets_a_new_magnets_set()
    {
        $magnets = [
            '2,3',
            '5,3'
        ];

        $this->setMagnets($magnets);

        $this->getMagnets()->shouldBe([
            '2,3',
            '5,3'
        ]);
    }

    public function it_validates_a_coordinate()
    {
        $this->isCoordinate('1,1')->shouldBe(true);
    }

    public function it_returns_false_with_invalid_coordinate()
    {
        $this->isCoordinate('1')->shouldBe(false);
    }

    public function it_returns_exception_with_invalid_coordinate()
    {
        $this->shouldThrow('\InvalidArgumentException')->duringDistanceBetweenCoordinates('2', '4');
    }

    public function it_gets_distance_between_two_points()
    {
        $this->distanceBetweenCoordinates('2,4', '3,2')->shouldBe(2.24);
    }

    public function it_gets_distance_between_other_two_points()
    {
        $this->distanceBetweenCoordinates('2,2', '4,4')->shouldBe(2.83);
    }

}


/*
x  x  x  x  x
x  1  x  x  x
x  x  x  x  x
x  x  *  x  2
x  x  x  x  x
*/