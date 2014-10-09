<?php 

class PostfixConverter {

    protected $stack;
    protected $precedence = [
        '+' => 1,
        '-' => 1,
        '*' => 2,
        '/' => 2
    ];

    function __construct(PostfixStack $stack)
    {
        $this->stack = $stack;
    }

    public function explode(&$expression)
    {
        while(strlen($expression) > 0)
        {
            $component = $this->extractNextComponentExpression($expression);

            $expression = $this->deleteComponentFromExpression($expression, $component);

            $this->explode($expression);    
        }
    }

    public function deleteComponentFromExpression($expression, $component)
    {
        return substr($expression, strlen($component), strlen($expression));   
    }

    public function extractNextComponentExpression($expression)
    {
        if(strlen($expression))
        {
            if(preg_match('/^\d+/', $expression, $match))
            {
                // $this->stack->push($match[0]);
                $this->applyNumberRules($match[0]);
            }
            elseif($match = $this->nextIsOperator($expression))
            {
                $this->stack->push($match[0]);
            }            
            else
            {
                $match[0] = $expression[0];
            }
        }

        return isset($match[0]) ? $match[0] : false;
    }

    public function applyNumberRules($number)
    {
        if($this->areTheLastTwoOperators())
        {
            $this->resolveOperatorsPrecedence($number);
        }
        elseif($this->isTheLastAnOperator())
        {
            $last = $this->stack->pop();

            $this->stack->push($number);
            $this->stack->push($last);
        }
        else
        {
            $this->stack->push($number);
        }
    }

    public function resolveOperatorsPrecedence($number)
    {
        $last = $this->stack->pop();
        $previous = $this->stack->pop();

        if($this->hasMorePrecedence($previous, $last))
        {
            $this->stack->push($number);
            $this->stack->push($last);
            $this->stack->push($previous);
        }
        else
        {
            $this->stack->push($previous);                        
            $this->stack->push($number);
            $this->stack->push($last);
        }
    }

    public function isTheLastAnOperator()
    {
        if($this->stack->count() >= 1)
        {
            $last = $this->stack->pop();

            $this->stack->push($last);

            return ($this->nextIsOperator($last));
        }

        return false;
    }

    public function areTheLastTwoOperators()
    {
        if($this->stack->count() > 1)
        {
            $last = $this->stack->pop();
            $previous = $this->stack->pop();

            $this->stack->push($previous);
            $this->stack->push($last);

            return ($this->nextIsOperator($last) && $this->nextIsOperator($previous));
        }
        return false;
    }

    public function nextIsOperator($expression)
    {
        $result = preg_match('/^(\+|-|\*|\/)/', $expression, $match);

        return (isset($match[0])) ? $match[0] : $result;
    }

    /**
     * Convert arithmetic expression to postfix notation
     *
     * @param  string $expression
     * @return string
     */
    public function convert($expression)
    {
        $this->explode($expression);
        
        return implode(' ', $this->stack->release());
    }

    public function hasMorePrecedence($base, $target)
    {
        if( ! array_key_exists($base, $this->precedence) || ! array_key_exists($target, $this->precedence))
            return false;
        
        return ($this->precedence[$target] > $this->precedence[$base]);
    }

}