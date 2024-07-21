<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target)
    {
        $start = 0;
        $end = count($nums) - 1;
        while ($start <= $end) {
            $middle = floor(($start + $end) / 2);
            if ($nums[$middle] == $target) {
                return $middle;
            } elseif ($nums[$middle] < $target) {
                $start = $middle + 1;
            } else {
                $end = $middle - 1;
            }
        }

        return $start;
    }
}
