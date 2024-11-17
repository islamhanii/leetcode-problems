<?php

class Solution
{

    /**
     * @param Int $n
     * @return Int
     */
    function climbStairs($n)
    {
        if ($n == 1) return 1;
        if ($n == 2) return 2;

        $array = array_fill(0, $n + 1, 0);
        $array[1] = 1;
        $array[2] = 2;

        for ($i = 3; $i <= $n; $i++) {
            $array[$i] = $array[$i - 1] + $array[$i - 2];
        }

        return $array[$n];
    }
}
