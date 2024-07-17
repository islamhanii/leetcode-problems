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
        $length = count($nums);
        $checkedNums = [];
        for ($i = 0; $i < $length; $i++) {
            if (in_array($nums[$i], $checkedNums)) continue;
            array_push($checkedNums, $nums[$i]);
            $index = array_search($target - $nums[$i], array_slice($nums, $i + 1));
            if ($index !== false) {
                return array($i, $index + $i + 1);
            }
        }
    }
}
