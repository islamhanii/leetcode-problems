<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums)
    {
        $length = count($nums);
        if ($length <= 1) return $length;

        $index = 1;
        for ($i = 1; $i < $length; $i++) {
            if ($nums[$i] != $nums[$index - 1]) {
                $nums[$index++] = $nums[$i];
            }
        }

        return $index;
    }
}
