<?php namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MagnetoEffectSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('MagnetoEffect');
    }

    public function let(\GeometricCalculator $calculator)
    {
        $magnets = [
            '2,4',
            '5,2'
        ];
        $radius = 2;

        $this->beConstructedWith($magnets, $radius, $calculator);
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

    public function it_decides_magent_is_in_range($calculator)
    {
        $magnet = '2,4';
        $target = '3,2';

        $calculator->distanceBetweenCoordinates($magnet, $target)->willReturn(2);
        $this->isMagnetInRange($magnet, $target)->shouldBe(true);
    }

    public function it_decides_magent_is_not_in_range($calculator)
    {
        $magnet = '2,4';
        $target = '3,2';

        $calculator->distanceBetweenCoordinates($magnet, $target)->willReturn(4);
        $this->isMagnetInRange($magnet, $target)->shouldBe(false);
    }

    public function it_returns_magnet_B_as_closest_magnet_to_target($calculator)
    {
        $a = '2,4';
        $b = '5,2';
        $target = '3,2';
        
        $calculator->distanceBetweenCoordinates($a, $target)->willReturn(5);
        $calculator->distanceBetweenCoordinates($b, $target)->willReturn(2);

        $this->drawingPoint($target)->shouldBe('5,2');
    }

    public function it_returns_magnet_A_as_closest_magnet_to_target($calculator)
    {
        $a = '2,4';
        $b = '5,2';
        $target = '3,2';
        
        $calculator->distanceBetweenCoordinates($a, $target)->willReturn(2);
        $calculator->distanceBetweenCoordinates($b, $target)->willReturn(5);

        $this->drawingPoint($target)->shouldBe('2,4');
    }
    public function it_does_not_find_magnet_closed($calculator)
    {
        $a = '2,4';
        $b = '5,2';
        $target = '3,2';
        
        $calculator->distanceBetweenCoordinates($a, $target)->willReturn(5);
        $calculator->distanceBetweenCoordinates($b, $target)->willReturn(3);

        $this->drawingPoint($target)->shouldBe(false);
    }

    public function it_chooses_one_of_two_magnets_with_same_distance_to_target($calculator)
    {
        $a = '2,4';
        $b = '4,4';
        $target = '3,4';

        $this->setMagnets([$a, $b]);
        
        $calculator->distanceBetweenCoordinates($a, $target)->willReturn(1);
        $calculator->distanceBetweenCoordinates($b, $target)->willReturn(1);

        $calculator->getClosestDistance($a, $b, $target)->willReturn('2,4');

        $this->drawingPoint($target)->shouldBe('2,4');
    }
}


/*
x  x  x  x  x
x  1  x  x  x
x  x  x  x  x
x  x  *  x  2
x  x  x  x  x
*/