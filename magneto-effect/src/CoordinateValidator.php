<?php

class CoordinateValidator {

    /**
     * Validates the coordinate format
     *
     * @param  string $point
     * @return boolean
     */
    public function isCoordinate($point)
    {
        return (bool) preg_match('/\d+,\d+/', $point);
    }

}
