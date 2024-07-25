<?php

class MyQueue
{
    private $queue = [];

    function __construct()
    {
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        array_push($this->queue, $x);
    }

    /**
     * @return Integer
     */
    function pop()
    {
        return array_shift($this->queue);
    }

    /**
     * @return Integer
     */
    function peek()
    {
        return reset($this->queue);
    }

    /**
     * @return Boolean
     */
    function empty()
    {
        return empty($this->queue);
    }
}

$obj = new MyQueue();
$obj->push($x);
$ret_2 = $obj->pop();
$ret_3 = $obj->peek();
$ret_4 = $obj->empty();
