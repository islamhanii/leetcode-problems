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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        $head = new ListNode(0);
        $current = $head;
        $carry = 0;

        while ($l1 !== null || $l2 !== null) {
            $sum = ($l1->val ?? 0) + ($l2->val ?? 0) + $carry;
            $carry = intdiv($sum, 10);
            $current->next = new ListNode($sum % 10);
            
            $current = $current->next;
            if ($l1 !== null) $l1 = $l1->next;
            if ($l2 !== null) $l2 = $l2->next;
        }

        if ($carry > 0) {
            $current->next = new ListNode($carry);
        }

        return $head->next;
    }
}
