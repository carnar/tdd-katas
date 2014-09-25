<?php namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CoordinateValidatorSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('CoordinateValidator');
    }

    public function it_validates_when_a_cordinate_its_ok()
    {
        $this->isCoordinate('3,3')->shouldBe(true);
    }

    public function it_returns_false_with_invalid_coordinate()
    {
        $this->isCoordinate('1')->shouldBe(false);
    }

}
