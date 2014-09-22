<?php

class Neighborhood
{

    protected $population;
    protected $matrixSize;

    function __construct($population, $matrixSize)
    {
        $this->population = $population;
        $this->matrixSize = $matrixSize;
    }

    public function isAlive($member)
    {
        return in_array($member, $this->population);
    }

    public function countNeighbors($member)
    {
        $neighbourds = 0;
        
        list($x, $y) = explode(',', $member);

        for ($i=$x-1; $i <= $x+1; $i++)
        { 
             for ($j=$y-1; $j <= $y+1; $j++)
             { 
                if("$i,$j" == $member) continue;

                if(in_array("$i,$j", $this->population)) $neighbourds++;
             }       
        }

        return $neighbourds;
    }
}
