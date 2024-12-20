<?php

class ListNode
{
    public $val = 0;
    public $next = null;
    function __construct($val)
    {
        $this->val = $val;
    }
}


class Solution
{
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head)
    {
        if ($head === null || $head->next === null) {
            return false;
        }

        $slow = $head;
        $fast = $head->next;

        while ($slow !== $fast) {
            if ($fast === null || $fast->next === null) {
                return false;
            }

            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        return true;
    }
}
