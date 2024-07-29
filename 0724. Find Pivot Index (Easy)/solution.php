<?php

class Solution
{
    /**
     * @param Int[] $nums
     * @return Integer
     */
    function pivotIndex($nums)
    {
        $n = count($nums);
        $leftSum = 0;
        $rightSum = array_sum($nums);

        for ($i = 0; $i < $n; $i++) {
            $rightSum -= $nums[$i];
            if ($leftSum == $rightSum) {
                return $i;
            }
            $leftSum += $nums[$i];
        }

        return -1;
    }
}
