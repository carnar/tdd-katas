<?php 

interface NeighborhoodInterface {

    /**
     * Returns Matrix dimension
     *
     * @return integer
     */
    public function getMatrixSize();
    
    /**
     * Define if is alive or die member
     *
     * @param  string $member
     * @return boolean
     */
    public function isAlive($member);

    /**
     * Returns neighbors alive
     *
     * @param  string $member
     * @return integer
     */
    public function countNeighbors($member);

}