<?php 

class ArithmeticExpressionManager {

    protected $precedence = [
        '+' => 1,
        '-' => 1,
        '*' => 2,
        '/' => 2
    ];

    public function deleteComponent($expression, $component)
    {
        return substr($expression, strlen($component), strlen($expression));   
    }

    public function getNextComponent($expression)
    {
        preg_match('/^(\d+|(\+|-|\*|\/))/', $expression, $match);

        return isset($match[0]) ? $match[0] : false;
    }

    public function isOperator($component)
    {
        $result = preg_match('/^(\+|-|\*|\/)$/', $component, $match);

        return (isset($match[0])) ? $match[0] : $result;
    }

    public function hasMorePrecedence($base, $target)
    {
        if( ! array_key_exists($base, $this->precedence) || ! array_key_exists($target, $this->precedence))
            return false;
        
        return ($this->precedence[$target] > $this->precedence[$base]);
    }


}