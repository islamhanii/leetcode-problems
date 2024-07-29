<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums)
    {
        $set = [];

        foreach ($nums as $num) {
            if ($set[$num]) {
                return true;
            }
            $set[$num] = true;
        }

        return false;
    }
}
