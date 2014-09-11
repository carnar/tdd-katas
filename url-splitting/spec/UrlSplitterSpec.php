<?php namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UrlSplitterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('UrlSplitter');
    }

    public function it_returns_an_array()
    {
        $this->split('http://google.com')->shouldBeArray();
    }

    public function it_returns_protocol_domain_in_the_first_key()
    {
        $this->split('http://google.com')->shouldHave(['protocol' => 'http']);
    }
}
