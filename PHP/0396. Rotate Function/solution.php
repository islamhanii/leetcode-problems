<?php

class Solution
{
    /**
     * @param Int[] $nums
     * @return Int
     */
    function maxRotateFunction($nums)
    {
        $n = count($nums);

        $sum = array_sum($nums);

        $f = 0;
        for ($i = 0; $i < $n; $i++) {
            $f += $i * $nums[$i];
        }

        $max = $f;


        for ($k = 1; $k < $n; $k++) {
            $f = $f + $sum - $n * $nums[$n - $k];
            $max = max($max, $f);
        }

        return $max;
    }
}
