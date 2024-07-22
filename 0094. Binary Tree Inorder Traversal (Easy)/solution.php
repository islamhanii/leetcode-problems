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
    function inorderTraversal($root)
    {
        $result = [];
        return $this->inorderTraversalHelper($root, $result);
    }

    function inorderTraversalHelper($root, $result)
    {
        if ($root === null) return;
        $this->inorderTraversalHelper($root->left, $result);
        $result[] = $root->val;
        $this->inorderTraversalHelper($root->right, $result);
        return $result;
    }
}
