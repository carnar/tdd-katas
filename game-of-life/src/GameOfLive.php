<?php

class GameOfLive {

    protected $constitution;
    protected $neighborhood;

    function __construct($constitution, $neighborhood)
    {
        $this->constitution = $constitution;
        $this->neighborhood = $neighborhood;
    }

    public function nextGeneration()
    {
        $next = [];

        for ($i=1; $i < $this->neighborhood->getMatrixSize(); $i++) 
        { 
            for ($j=1; $j < $this->neighborhood->getMatrixSize(); $j++) 
            { 
                if($this->constitution->willLive("$i,$j"))
                {
                    $next[] = '1,1'; 
                }
            }
        }

        return $next;
    }

}
