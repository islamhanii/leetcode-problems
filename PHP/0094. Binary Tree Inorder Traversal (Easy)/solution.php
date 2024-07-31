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
    function inorderTraversal($root, &$result = [])
    {
        if ($root === null) return $result;
        $this->inorderTraversal($root->left, $result);
        $result[] = $root->val;
        $this->inorderTraversal($root->right, $result);
        return $result;
    }
}
