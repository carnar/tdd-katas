<?php

namespace AlphabeticOrder;

class WordChecker
{
    public function isSorted($word)
    {
        $max = 0;
        
        for ($i=0; $i < strlen($word); $i++) { 
            $current = ord($word[$i]);

            if( $current < $max) {
                return false;
            }
            $max = $current;

        }
        return true;
    }
}
