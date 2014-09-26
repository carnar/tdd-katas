<?php 

class PostfixStack {

    protected $stack = [];

    public function count()
    {
        return count($this->stack);
    }

    public function push($object)
    {
        return array_push($this->stack, $object);
    }

}