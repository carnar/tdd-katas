<?php

class GameOfLife {
    /**
     * Game of life rules
     *
     * @var Constitution
     */
    protected $constitution;

    /**
     * Population information
     *
     * @var Neighborhood
     */
    protected $neighborhood;

    function __construct(ConstitutionInterface $constitution, NeighborhoodInterface $neighborhood)
    {
        $this->constitution = $constitution;
        $this->neighborhood = $neighborhood;
    }

    /**
     * Defines next generation
     *
     * @return array
     */
    public function nextGeneration()
    {
        $next = [];

        for ($i=1; $i <= $this->neighborhood->getMatrixSize(); $i++) 
        { 
            for ($j=1; $j <= $this->neighborhood->getMatrixSize(); $j++) 
            { 
                $member = "$i,$j";

                if($this->constitution->willLive($member))
                {
                    $next[] = $member; 
                }
            }
        }

        return $next;
    }

}
