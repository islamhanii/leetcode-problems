<?php

class Solution
{
    /**
     * @param Int[] $nums
     * @param Int $target
     * @return Int[]
     */
    function twoSum($nums, $target)
    {
        $map = [];
        for ($i = 0; $i < count($nums); $i++) {
            $complement = $target - $nums[$i];
            if (array_key_exists($complement, $map)) {
                return [$map[$complement], $i];
            }
            $map[$nums[$i]] = $i;
        }

        return [];
    }
}
