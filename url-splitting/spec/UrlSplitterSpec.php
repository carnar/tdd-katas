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
        $url = 'http://google.com';
        $this->split($url)->shouldBeArray();
    }

    public function it_gets_protocol_url()
    {
        $url = 'http://google.com';
        $this->protocol($url)->shouldBe('http');
    }

    public function it_gets_other_kind_of_protocol()
    {
        $url = 'ftp://google.com';
        $this->protocol($url)->shouldBe('ftp');
    }

    public function it_gets_a_empty_protocol()
    {
        $url = 'google.com';
        $this->protocol($url)->shouldBe('');
    }

    public function it_gets_a_simple_domain()
    {
        $url = 'http://google.com';
        $this->domain($url)->shouldBe('google.com');
    }

    public function it_gets_a_complex_domain()
    {
        $url = 'http://gt.docs.google-1.com.gt/search?q=car';
        $this->domain($url)->shouldBe('gt.docs.google-1.com.gt');
    }

    public function it_raise_exception_with_invalid_domain()
    {
        $url = 'google';
        $this->shouldThrow('InvalidArgumentException')->duringDomain($url);
    }

    public function it_gets_the_last_part_of_url()
    {
        $url = 'http://google.com/search?q=car';
        $this->path($url)->shouldBe('search?q=car');
    }
}