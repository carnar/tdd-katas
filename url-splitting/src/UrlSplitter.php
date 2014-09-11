<?php

class UrlSplitter
{
    public function split($url)
    {
        list($protocol, $other) = explode('://', $url);
        $components ['protocol'] = $protocol;
        var_dump($components);
        return $components;
    }
}
