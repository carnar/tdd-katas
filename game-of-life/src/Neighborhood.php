<?php

class Neighborhood implements NeighborhoodInterface
{
    /**
     * Alive members
     *
     * @var array
     */
    protected $population;

    /**
     * Matrix dimensions
     *
     * @var integer
     */
    private $matrixSize = 0;

    function __construct($population, $matrixSize)
    {
        $this->population = $population;
        $this->matrixSize = $matrixSize;
    }

    /**
     * Returns Matrix dimension
     *
     * @return integer
     */
    public function getMatrixSize()
    {
        return $this->matrixSize;
    }

    /**
     * Define if is alive or die member
     *
     * @param  string $member
     * @return boolean
     */
    public function isAlive($member)
    {
        return in_array($member, $this->population);
    }

    /**
     * Returns neighbors alive
     *
     * @param  string $member
     * @return integer
     */
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
