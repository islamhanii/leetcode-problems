<?php

class Solution
{
    /**
     * @param Int $n
     * @param Int $k
     * @return Int
     */
    function kthFactor($n, $k)
    {
        $i = 1;
        $counter = 1;

        while ($i <= $n) {
            if ($n % $i == 0) {
                if ($counter == $k) {
                    return $i;
                }
                $counter++;
            }
            $i++;
        }

        return -1;
    }
}
