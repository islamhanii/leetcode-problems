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
    function insertIntoBST($root, $val)
    {
        if ($root === null) {
            return new TreeNode($val);
        }

        if ($val < $root->val) {
            $root->left = $this->insertIntoBST($root->left, $val);
        } elseif ($val > $root->val) {
            $root->right = $this->insertIntoBST($root->right, $val);
        }

        return $root;
    }
}
