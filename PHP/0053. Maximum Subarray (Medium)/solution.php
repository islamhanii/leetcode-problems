<?php

class Solution
{
    /**
     * @param Int[] $nums
     * @return Integer
     */
    function maxSubArray($nums)
    {
        $maxSum = $nums[0];
        $currentSum = $nums[0];
        for ($i = 1; $i < count($nums); $i++) {
            $currentSum = max($nums[$i], $currentSum + $nums[$i]);
            $maxSum = max($maxSum, $currentSum);
        }

        return $maxSum;
    }
}
