<?php 

class PostfixConverter {

    protected $expressionManager;

    protected $stack;

    function __construct(ArithmeticExpressionManager $expressionManager, PostfixStack $stack)
    {
        $this->expressionManager = $expressionManager;
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
            $component = $this->expressionManager->getNextComponent($expression);

            $this->applyRules($component);

            $expression = $this->expressionManager->deleteComponent($expression, $component);

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
            elseif($match = $this->expressionManager->isOperator($component))
            {
                $this->stack->push($match[0]);
            }               
        }
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

    public function isTheLastAnOperator()
    {
        if($this->stack->count() >= 1)
        {
            $last = $this->stack->pop();

            $this->stack->push($last);

            return ($this->expressionManager->isOperator($last));
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

            return ($this->expressionManager->isOperator($last) && $this->expressionManager->isOperator($previous));
        }
        return false;
    }

    public function resolveOperatorsPrecedence($number)
    {
        $last = $this->stack->pop();
        $previous = $this->stack->pop();

        if($this->expressionManager->hasMorePrecedence($previous, $last))
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
}