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

    /**
     * Convert arithmetic expression to postfix notation
     *
     * @param  string $expression
     * @return string
     */
    public function convert($expression)
    {
        $this->evaluate($expression);
        
        return implode(' ', $this->stack->release());
    }

    public function evaluate(&$expression)
    {
        while(strlen($expression) > 0)
        {
            $component = $this->extractNextComponentExpression($expression);

            $this->applyRules($component);

            $expression = $this->deleteComponentFromExpression($expression, $component);

            $this->evaluate($expression);    
        }
    }

    public function applyRules($component)
    {
        if( ! empty($component))
        {
            if(preg_match('/^\d+$/', $component, $match))
            {
                $this->applyNumberRules($match[0]);
            }
            elseif($match = $this->nextIsOperator($component))
            {
                $this->stack->push($match[0]);
            }               
        }
    }

    public function deleteComponentFromExpression($expression, $component)
    {
        return substr($expression, strlen($component), strlen($expression));   
    }

    public function extractNextComponentExpression($expression)
    {
        preg_match('/^(\d+|(\+|-|\*|\/))/', $expression, $match);

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

    public function hasMorePrecedence($base, $target)
    {
        if( ! array_key_exists($base, $this->precedence) || ! array_key_exists($target, $this->precedence))
            return false;
        
        return ($this->precedence[$target] > $this->precedence[$base]);
    }

}