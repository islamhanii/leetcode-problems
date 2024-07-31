<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums)
    {
        $zeroCount = 0;
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] === 0) {
                $zeroCount++;
            } else {
                $nums[$i - $zeroCount] = $nums[$i];
            }
        }

        for ($i = count($nums) - 1; $i >= count($nums) - $zeroCount; $i--) {
            $nums[$i] = 0;
        }

        return $nums;
    }
}
