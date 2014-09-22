<?php

class Constitution
{
    protected $neighborhood;

    function __construct($neighborhood)
    {
        $this->neighborhood = $neighborhood;
    }

    public function willLive($member)
    {
        if ( ! $this->neighborhood->isAlive($member))
        {
            return ($this->neighborhood->countNeighbors($member) == 3);
        }
        else
        {
            return true;
        }
    }
}
