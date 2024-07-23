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
    function isValidBST($root)
    {
        return $this->isValidBSTHelper($root, null, null);
    }

    function isValidBSTHelper($root, $min, $max)
    {
        if ($root === null) {
            return true;
        }
        if (($min !== null && $root->val <= $min) || ($max !== null && $root->val >= $max)) {
            return false;
        }
        return $this->isValidBSTHelper($root->left, $min, $root->val) && $this->isValidBSTHelper($root->right, $root->val, $max);
    }
}
