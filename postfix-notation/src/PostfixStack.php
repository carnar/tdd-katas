<?php 

class PostfixStack implements StackInterface {

    /**
     * Manage the postfix stack
     *
     * @var array
     */
    protected $stack = [];

    /**
     * Count the stack members
     *
     * @return integer
     */
    public function count()
    {
        return count($this->stack);
    }

    /**
     * Push an object to stack and return members number
     *
     * @param  mixed $object
     * @return integer
     */
    public function push($object)
    {
        return array_push($this->stack, $object);
    }

    /**
     * Pop out an object from the stack. Returns null if the stack is empty.
     *
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->stack);
    }

    /**
     * Empty stack and return it
     *
     * @return array
     */
    public function release()
    {
        $stack = $this->stack;

        $this->stack = [];

        return $stack;
    }

}