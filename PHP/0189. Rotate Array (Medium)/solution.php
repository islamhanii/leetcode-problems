<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Int $k
     * @return NULL
     */
    function rotate(&$nums, $k)
    {
        $length = count($nums);
        $nums = array_merge(array_slice($nums, $length - ($k % $length), $length), array_slice($nums, 0, $length - ($k % $length)));
    }
}
