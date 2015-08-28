<?php 

namespace FizzBuzz;

class FizzBuzz
{
    /**
     * Gets the fizzbuzz number
     *
     * @param  int $number
     * @return int | string
     */
    public function get($number)
    {
        $result = '';
        if($number % 3 == 0) $result .= 'fizz';
        if($number % 5 == 0) $result .= 'buzz';

        $number = $result ?: $number;

        return $number;
    }

    /**
     * Gets fizzbuzz scale
     *
     * @param  int $top
     * @return string
     */
    public function scale($top)
    {
        $result = [];

        for ($i=1; $i <= $top; $i++) {
            $result[] = $this->get($i);
        }

        return implode(', ', $result);
    }
}