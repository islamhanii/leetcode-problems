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
     * @param Integer $val
     * @return TreeNode
     */
    function searchBST($root, $val)
    {
        if ($root === null || $root->val === $val) {
            return $root;
        }

        if ($root->val < $val) {
            return $this->searchBST($root->right, $val);
        }

        return $this->searchBST($root->left, $val);
    }
}
