<?php namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConstitutionSpec extends ObjectBehavior
{

    public function let(\Neighborhood $neighborhood)
    {
        $this->beConstructedWith($neighborhood);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Constitution');
    }

    public function it_decides_the_member_lives(\Neighborhood $neighborhood)
    {
        $member = '2,3';

        $neighborhood->isAlive($member)->willReturn(true);

        $neighborhood->countNeighbors($member)->willReturn(2);

        $this->willLive($member)->shouldBe(true);
    }

    public function it_decides_dead_member_revives_with_3_neighbors(\Neighborhood $neighborhood)
    {
        $member ='2,4';

        $neighborhood->isAlive($member)->willReturn(false);

        $neighborhood->countNeighbors($member)->willReturn(3);

        $this->willLive($member)->shouldBe(true);
    }

    public function it_decides_alive_member_die_with_4_neighbors(\Neighborhood $neighborhood)
    {
        $member = '3,3';

        $neighborhood->isAlive($member)->willReturn(true);

        $neighborhood->countNeighbors($member)->willReturn(4);

        $this->willLive($member)->shouldBe(false);
    }

    public function it_decides_alive_member_live_with_3_neighbors(\Neighborhood $neighborhood)
    {
        $member = '2,4';

        $neighborhood->isAlive($member)->willReturn(true);

        $neighborhood->countNeighbors($member)->willReturn(3);

        $this->willLive($member)->shouldBe(true);
    }

}
