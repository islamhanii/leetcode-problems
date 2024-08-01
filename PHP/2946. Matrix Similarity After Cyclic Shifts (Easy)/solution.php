<?php

class Solution
{
    /**
     * @param Integer[][] $mat
     * @param Int $k
     * @return Boolean
     */
    function areSimilar($mat, $k)
    {
        $m = count($mat);
        $n = count($mat[0]);
        $k = $k % $n;

        if ($m != 1 || $n != 1) {
            for ($i = 0; $i < $m; $i++) {
                for ($j = 0; $j < $n; $j++) {
                    if ($i % 2 == 0) {
                        if ($mat[$i][$j] != $mat[$i][($n + $j - $k) % $n]) {
                            return false;
                        }
                    } else {
                        if ($mat[$i][$j] != $mat[$i][($j + $k) % $n]) {
                            return false;
                        }
                    }
                }
            }
        }

        return true;
    }
}
