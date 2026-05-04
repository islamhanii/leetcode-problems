<?php

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(&$matrix)
    {
        $n = count($matrix);
        $newMatrix = array_fill(0, $n, array_fill(0, $n, 0));

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $newMatrix[$i][$j] = $matrix[$n - 1 - $j][$i];
            }
        }

        $matrix = $newMatrix;
    }
}
