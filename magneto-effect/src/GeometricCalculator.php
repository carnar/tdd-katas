<?php

class GeometricCalculator {

    /**
     * Coordinate validator.
     *
     * @var CoordinateValidator
     */
    protected $validator;

    function __construct(CoordinateValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Gets distance betweent two coordinates.
     *
     * @param  string $a
     * @param  string $b
     * @return float
     */
    public function distanceBetweenCoordinates($a, $b)
    {
        if( ! $this->validator->isCoordinate($a) && ! $this->validator->isCoordinate($b) ) 
            throw new InvalidArgumentException;

        $a = explode(',', $a);
        $b = explode(',', $b);

        $x =  pow(((int) $b[0] -  (int) $a[0]), 2);
        $y =  pow(((int) $b[1] -  (int) $a[1]), 2);

        return round(sqrt($x + $y), 2);
    }

    /**
     * Calculates distances between coordinates to the target and returns the closest one.
     *
     * @param  string $a
     * @param  string $b
     * @param  string $target
     * @return string
     */
    public function getClosestDistance($a, $b, $target)
    {
        $distanceA = $this->distanceBetweenCoordinates($a, $target);           
        $distanceB = $this->distanceBetweenCoordinates($b, $target);           

        return ($distanceA <= $distanceB) ? $a : $b;
    }
}
