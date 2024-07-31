<?php

class ListNode
{
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{
    /**
     * @param ListNode $head
     * @param Integer $val
     * @return ListNode
     */
    function removeElements($head, $val)
    {
        if ($head === null) {
            return null;
        }

        $dummy = new ListNode(0, $head);
        $current = $dummy;

        while ($current->next !== null) {
            if ($current->next->val === $val) {
                $current->next = $current->next->next;
            } else {
                $current = $current->next;
            }
        }

        return $dummy->next;
    }
}
