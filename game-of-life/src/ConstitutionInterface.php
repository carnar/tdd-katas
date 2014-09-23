<?php 

interface ConstitutionInterface {

    /**
     * Applies game of life rules for next generation
     *
     * @param  string $member
     * @return boolean
     */
    public function willLive($member);

}