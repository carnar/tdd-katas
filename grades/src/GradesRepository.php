<?php namespace School;

class GradesRepository {

    /**
     * Calculates the average of the grades
     *
     * @param  int $userId
     * @param  array $grades
     * @return float
     */
    public function average($userId, array $grades)
    {
        return array_sum($grades) / count($grades);
    }

    /**
     * Return true if the student has grade bigger than best grade.
     *
     * @param  int $userId
     * @param  array $grades
     * @param  float $bestGrade
     * @return boolean
     */
    public function isGoodStudent($userId, array $grades, $bestGrade)
    {
        if(is_numeric($userId))
            return ($this->average($userId, $grades) > $bestGrade);

        throw new \InvalidArgumentException("Error Processing Request", 1);
    }

}
