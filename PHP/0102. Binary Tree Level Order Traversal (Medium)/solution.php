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
     * @return Integer[][]
     */
    function levelOrder($root)
    {
        $result = [];
        if ($root === null) {
            return $result;
        }

        $queue = new \SplQueue();
        $queue->enqueue($root);

        while (!$queue->isEmpty()) {
            $level = [];
            $size = $queue->count();

            for ($i = 0; $i < $size; $i++) {
                $node = $queue->dequeue();
                $level[] = $node->val;

                if ($node->left !== null) {
                    $queue->enqueue($node->left);
                }

                if ($node->right !== null) {
                    $queue->enqueue($node->right);
                }
            }

            $result[] = $level;
        }

        return $result;
    }
}
