<?php 

class PostfixConverter {

    protected $stack;
    protected $operatorStack;

    function __construct()
    {
        $this->stack = new PostfixStack;
        $this->operatorStack = new PostfixStack;
    }
     
    // public function convert($expersion)
    // {
    //     preg_match('/\d+|\+/', $expersion, $parts);

    //     foreach ($parts as $part) 
    //     {
    //         var_dump($part);
    //         if(is_int($part))
    //         {
    //             $this->stack->push($part);
    //         }
    //         else
    //         {
    //             $this->operatorStack->push($part);
    //         }
    //     }

    //     return implode(' ', $this->stack->release());
    // }

    public function explode($expression)
    {
        while(strlen($expression) > 0)
        {
            if(preg_match('/^\d+/', $expression, $match))
            {
                $this->stack->push($match);
            }
            elseif(preg_match('/^(\+|-|\*|\/)/', $expression, $match))
            {

            }

        }
        $this->stack->push('3');
        $this->operatorStack->push('+');
    }

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