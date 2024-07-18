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
     * @param Int $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n)
    {
        $dummy = new ListNode(0, $head);
        $slow = $dummy;
        $fast = $dummy;
        
        for ($i = 0; $i < $n + 1; $i++) {
            $fast = $fast->next;
        }
        
        while ($fast!== null) {
            $slow = $slow->next;
            $fast = $fast->next;
        }

        $slow->next = $slow->next->next;
        
        return $dummy->next;
    }
}
