<?php

class UrlSplitter {

    public function split($url)
    {              
        return [
            'protocol' => $this->protocol($url),
            'domain' => $this->domain($url),
            'path' => ''
        ];
    }

    public function protocol($url)
    {
        preg_match('/.+(?=:\/\/)/', $url, $matches);

        return  (empty($matches)) ? '' : $matches[0];
    }

    public function domain($url)
    {
        preg_match('/(?<=:\/\/)[a-z0-9][a-z\.0-9-]+[a-z0-9]{2,5}/', $url, $matches);

        if(empty($matches)) throw new InvalidArgumentException();

        return $matches[0];
    }

    public function path($url)
    {
        preg_match('/(?<=[a-z]\/).+/', $url, $matches);

        return (empty($matches[0])) ? '' : $matches[0];
    }

}
