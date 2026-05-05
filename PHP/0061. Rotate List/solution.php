<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution
{

    /**
     * @param ListNode $head
     * @param Int= $k
     * @return ListNode
     */
    function rotateRight($head, $k)
    {
        $length = 1;
        $current = $head;
        while ($current->next) {
            $length++;
            $current = $current->next;
        }

        $reminder = $k % $length;
        if ($reminder > 0) {
            $lastNode = $current;
            $current = $head;
            while (true) {
                $length--;
                if ($length - $reminder == 0) {
                    $lastNode->next = $head;
                    $head = $current->next;
                    $current->next = null;
                    break;
                }
                $current = $current->next;
            }
        }

        return $head;
    }
}
