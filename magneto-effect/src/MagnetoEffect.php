<?php

class MagnetoEffect {

    /**
     * Magnets in the game
     *
     * @var array
     */
    protected $magnets;

    /**
     * Radius magnets
     *
     * @var integer
     */
    protected $radius;

    /**
     * Geometric calculator
     *
     * @var GeometricCalculator
     */
    protected $calculator;

    function __construct($magnets, $radius, GeometricCalculator $calculator)
    {
        $this->magnets = $magnets;
        $this->radius = $radius;
        $this->calculator = $calculator;
    }

    /**
     * Gets array magnets
     *
     * @return array
     */
    public function getMagnets()
    {
        return $this->magnets;
    }

    /**
     * Set a new array magnets
     *
     * @param [type] $magnets
     */
    public function setMagnets($magnets)
    {
        $this->magnets = $magnets;
    }

    /**
     * Determinates if magnet reach the target
     *
     * @param  string $magnet
     * @param  string $target
     * @return boolean
     */
    public function isMagnetInRange($magnet, $target)
    {
        $distance = $this->calculator->distanceBetweenCoordinates($magnet, $target);           
        
        return ($distance <= $this->radius);
    }

    /**
     * Gets drawing point after magnet effect.
     *
     * @param  string $target
     * @return mixed
     */
    public function drawingPoint($target)
    {
        $closestMagnet = false;

        foreach ($this->magnets as $magnet) 
        {
            if( ! $this->isMagnetInRange($magnet, $target)) continue;

            $closestMagnet = ( ! $closestMagnet) 
                ? $magnet 
                : $this->calculator->getClosestDistance($closestMagnet, $magnet, $target);
        }

        return $closestMagnet;
    }

}
