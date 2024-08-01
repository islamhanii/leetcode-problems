<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function buildArray($nums)
    {
        $result = [];
        $n = count($nums);
        
        for ($i = 0; $i < $n; $i++) {
            $result[] = $nums[$nums[$i]];
        }

        return $result;
    }
}
