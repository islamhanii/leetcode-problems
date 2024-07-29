<?php

class Node
{
    public $val = null;
    public $children = null;
    function __construct($val = 0)
    {
        $this->val = $val;
        $this->children = array();
    }
}


class Solution
{
    /**
     * @param Node $root
     * @return integer[]
     */
    function preorder($root, &$result = [])
    {
        if ($root === null) return $result;

        $result[] = $root->val;
        foreach ($root->children as $child) {
            $this->preorder($child, $result);
        }

        return $result;
    }
}
