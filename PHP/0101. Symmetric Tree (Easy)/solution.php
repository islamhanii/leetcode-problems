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
     * @return Boolean
     */
    function isSymmetric($root)
    {
        return $this->isMirror($root, $root);
    }

    private function isMirror($left, $right)
    {
        if ($left === null && $right === null) {
            return true;
        }

        if ($left === null || $right === null || $left->val != $right->val) {
            return false;
        }

        return $this->isMirror($left->left, $right->right) && $this->isMirror($left->right, $right->left);
    }
}
