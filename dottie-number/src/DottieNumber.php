<?php

namespace DottieNumber;

class DottieNumber
{
    /**
     * Calculate the dottie number or snapshot of the process
     *
     * @param  integer $number
     * @param  integer $times
     * @return string
     */
    public function calculate($number, $times = 100)
    {
        $old = '';

        while (! $this->areEqualsTrunked($old, $number) && $times > 0) {
            $old = $number;
            $number = number_format(cos($number), 12);
            $times--;
        }

        return $this->trunkDecimals($number, 6);
    }

    /**
     * Comper if a decimal is equals to other with decimals trunked 
     *
     * @param  integer $old
     * @param  integer $new
     * @return bool
     */
    private function areEqualsTrunked($old, $new)
    {
        return $this->trunkDecimals($old, 6) == $this->trunkDecimals($new,6);
    }

    /**
     * Trunk a number with the specific amount of decimals
     *
     * @param  integer $number
     * @param  integer $decimals
     * @return string
     */
    private function trunkDecimals($number, $decimals)
    {
        $dotPosition = strpos((string)$number, '.');

        return substr($number, 0, $decimals + $dotPosition + 1);
    }
}