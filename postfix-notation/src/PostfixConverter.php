<?php 

class PostfixConverter {

    protected $stack;
    protected $operatorStack;

    function __construct()
    {
        $this->stack = new PostfixStack;
        $this->operatorStack = new PostfixStack;
    }

    public function explode(&$expression)
    {
        while(strlen($expression) > 0)
        {
            $component = $this->nextExpressionComponent($expression);

            if($size = strlen($component))
            {
                $expression = substr($expression, $size, strlen($expression));
            }
            else
            {
                $expression = substr($expression, 1, strlen($expression));   
            }
            $this->explode($expression);    
        }
    }

    public function nextExpressionComponent($expression)
    {
        if(preg_match('/^\d+/', $expression, $match))
        {
            $this->stack->push($match[0]);
        }
        elseif(preg_match('/^(\+|-|\*|\/)/', $expression, $match))
        {
            $this->operatorStack->push($match[0]);
        }

        return isset($match[0]) ? $match[0] : false;
    }

    /**
     * Convert arithmetic expression to postfix notation
     *
     * @param  string $expression
     * @return string
     */
    public function convert($expression)
    {
        $result = '';

        $this->explode($expression);

        if($this->stack->count())
        {
            $result = implode(' ', $this->stack->release());

            if($this->operatorStack->count())
            {
                $result .= ' ' . implode(' ', $this->operatorStack->release()); 
            }
        }

        return $result; 
    }

}