<?php

class GameOfLive {
    
    public function countNeighbourds(array $population, $member)
    {
        $neighbourds = -1;
        
        list($x, $y) = explode(',', $member);

        for ($i=$x-1; $i <= $x+1; $i++)
        { 
             for ($j=$y-1; $j <= $y+1; $j++)
             { 
                if(in_array("$i,$j", $population)) $neighbourds++;
             }       
        }

        return $neighbourds;
    }

    public function willDie(array $poblation, $member)
    {
        $neighbourds = $this->countNeighbourds($poblation, $member);

        return ! ( $neighbourds > 1 && $neighbourds < 4);
    }

}
