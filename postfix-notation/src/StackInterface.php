<?php 

interface StackInterface {

    /**
     * Count the stack members
     *
     * @return integer
     */
    public function count();

    /**
     * Push an object to stack and return members number
     *
     * @param  mixed $object
     * @return integer
     */
    public function push($object);

    /**
     * Pop out an object from the stack. Returns null if the stack is empty.
     *
     * @return mixed
     */
    public function pop();

    /**
     * Empty stack and return it
     *
     * @return array
     */
    public function release();

}