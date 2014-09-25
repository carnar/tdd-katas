<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GeometricCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('GeometricCalculator');
    }

    public function let(\CoordinateValidator $validator)
    {
        $this->beConstructedWith($validator);
    }

    public function it_returns_exception_with_invalid_coordinate()
    {
        $this->shouldThrow('\InvalidArgumentException')->duringDistanceBetweenCoordinates('2', '4');
    }

    public function it_gets_distance_between_two_points($validator)
    {
        $a = '2,4';
        $b = '3,2';

        $validator->isCoordinate($a)->willReturn(true);
        $validator->isCoordinate($b)->willReturn(true);
        
        $this->distanceBetweenCoordinates($a, $b)->shouldBe(2.24);
    }

    public function it_gets_distance_between_other_two_points($validator)
    {
        $a = '2,2';
        $b = '4,4';

        $validator->isCoordinate($a)->willReturn(true);
        $validator->isCoordinate($b)->willReturn(true);

        $this->distanceBetweenCoordinates($a, $b)->shouldBe(2.83);
    }

    public function it_gets_distance_between_equals_coordinates($validator)
    {
        $a = '2,2';
        $b = '2,2';

        $validator->isCoordinate($a)->willReturn(true);
        $validator->isCoordinate($b)->willReturn(true);

        $this->distanceBetweenCoordinates($a, $b)->shouldBe(0.00);
    }
}
