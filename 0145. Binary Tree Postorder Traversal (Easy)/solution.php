<?php

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution
{
    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function postorderTraversal($root, &$result = [])
    {
        if ($root === null) return [];

        $this->postorderTraversal($root->left, $result);
        $this->postorderTraversal($root->right, $result);
        $result[] = $root->val;

        return $result;
    }
}
