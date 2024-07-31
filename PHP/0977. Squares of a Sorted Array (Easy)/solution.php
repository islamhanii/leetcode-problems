<?php

class Solution
{
    /**
     * @param Int[] $nums
     * @return Integer[]
     */
    function sortedSquares($nums)
    {
        $n = count($nums);
        $result = array_fill(0, $n, 0);
        $left = 0;
        $right = $n - 1;
        $position = $n - 1;

        while ($left <= $right) {
            if (abs($nums[$left]) > abs($nums[$right])) {
                $result[$position] = $nums[$left] * $nums[$left];
                $left++;
            } else {
                $result[$position] = $nums[$right] * $nums[$right];
                $right--;
            }
            $position--;
        }

        return $result;
    }
}
