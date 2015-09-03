<?php 

use School\GradesRepository;

class GradesRepositoryTest extends PHPUnit_Framework_TestCase {

    public function test_if_student_grade_the_course()
    {
        // Arrange
        $userId = 1;
        $grades = [
            'math' => 60,
            'science' => 40,
            'language' => 90,
            'sports' => 50
        ];
        
        //  Act
        $repository = new GradesRepository;
        $average = $repository->average($userId, $grades);
        
        //  Expect
        $this->assertEquals(60, $average);
    }

    public function test_when_a_good_student_grades_the_class()
    {
        // Arrange
        $userId = 1;
        $grades = [
            'math' => 90,
            'science' => 90,
            'language' => 80,
            'sports' => 80
        ];
        
        //  Act
        $repository = new GradesRepository;
        $average = $repository->average($userId, $grades);
        
        //  Expected
        $this->assertEquals(85, $average);
        
    }

    public function test_fails_when_is_a_bad_student()
    {
        // Arrange
        $userId = 1;
        $grades = [
            'math' => 60,
            'science' => 40,
            'language' => 90,
            'sports' => 50
        ];
        $bestGrade = 80;

        // Act
        $repository = new GradesRepository;
        $isGood = $repository->isGoodStudent($userId, $grades, $bestGrade);

        // Expected
        $this->assertFalse($isGood);
    }
    

    public function test_pass_if_is_a_good_student()
    {
        // Arrange
        $userId = 1;
        $grades = [
            'math' => 90,
            'science' => 90,
            'language' => 80,
            'sports' => 80
        ];
        $bestGrade = 80;

        // Act
        $repository = new GradesRepository;
        $isGood = $repository->isGoodStudent($userId, $grades, $bestGrade);

        // Expected
        $this->assertTrue($isGood);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_throw_an_exception_if_userid_is_not_a_integer()
    {
        //Arrange
        $userId = 'a';
        $grades = [
            'math' => 90,
            'science' => 90,
            'language' => 80,
            'sports' => 80
        ];
        $bestGrade = 80;

        //Act
        $repository = new GradesRepository;
        $isGood = $repository->isGoodStudent($userId, $grades, $bestGrade);
    }
}