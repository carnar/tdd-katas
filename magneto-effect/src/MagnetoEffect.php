<?php

class MagnetoEffect {

    protected $magnets;
    protected $radius;
    protected $matrixSize;

    function __construct($magnets, $radius, $matrixSize)
    {
        $this->magnets = $magnets;
        $this->radius = $radius;
        $this->matrixSize = $matrixSize;
    }

    public function getMagnets()
    {
        return $this->magnets;
    }

    public function setMagnets($magnets)
    {
        $this->magnets = $magnets;
    }

    public function isCoordinate($point)
    {
        return (bool) preg_match('/\d+,\d+/', $point);
    }

    public function distanceBetweenCoordinates($a, $b)
    {
        if( ! $this->isCoordinate($a) && ! $this->isCoordinate($b) ) throw new InvalidArgumentException;

        $a = explode(',', $a);
        $b = explode(',', $b);

        $x =  pow(((int) $b[0] -  (int) $a[0]), 2);
        $y =  pow(((int) $b[1] -  (int) $a[1]), 2);

        return round(sqrt($x + $y), 2);
    }
}
