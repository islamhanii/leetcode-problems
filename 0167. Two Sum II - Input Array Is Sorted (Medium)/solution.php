<?php

class Solution
{
    /**
     * @param Int[] $numbers
     * @param Int $target
     * @return Integer[]
     */
    function twoSum($numbers, $target)
    {
        $left = 0;
        $right = count($numbers) - 1;

        while ($left < $right) {
            $currentSum = $numbers[$left] + $numbers[$right];

            if ($currentSum === $target) {
                return [$left + 1, $right + 1];
            } elseif ($currentSum < $target) {
                $left++;
            } else {
                $right--;
            }
        }

        return [];
    }
}
