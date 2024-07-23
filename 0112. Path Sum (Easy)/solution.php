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
     * @param Integer $targetSum
     * @return Boolean
     */
    function sumLeaf($root, $sum, $targetSum)
    {
        if (!$root)  return false;
        $sum += $root->val;
        if ($sum == $targetSum && !$root->left && !$root->right)  return true;
        return $this->sumLeaf($root->left, $sum, $targetSum) || $this->sumLeaf($root->right, $sum, $targetSum);
    }

    function hasPathSum($root, $targetSum)
    {
        if (!$root)  return false;

        return $this->sumLeaf($root, 0, $targetSum);
    }
}
