<?php

class Constitution implements ConstitutionInterface
{
    /**
     * Population information
     *
     * @var Neighborhood
     */
    protected $neighborhood;

    function __construct(Neighborhood $neighborhood)
    {
        $this->neighborhood = $neighborhood;
    }

    /**
     * Applies game of life rules for next generation
     *
     * @param  string $member
     * @return boolean
     */
    public function willLive($member)
    {
        if ( ! $this->neighborhood->isAlive($member))
        {
            return ($this->neighborhood->countNeighbors($member) == 3);
        }
        else
        {
            $neighbors = $this->neighborhood->countNeighbors($member);
            
            return ($neighbors > 1 && $neighbors < 4);
        }
    }
}
