<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function getConcatenation($nums)
    {
        $length = count($nums);
        $result = array_fill(0, $length * 2, 0);

        for ($i = 0; $i < $length; $i++) {
            $result[$i] = $nums[$i];
            $result[$i + $length] = $nums[$i];
        }

        return $result;
    }
}
