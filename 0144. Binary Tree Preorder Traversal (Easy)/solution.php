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
    function preorderTraversal($root, &$result = [])
    {
        if ($root === null) return [];

        $result[] = $root->val;
        $this->preorderTraversal($root->left, $result);
        $this->preorderTraversal($root->right, $result);

        return $result;
    }
}
