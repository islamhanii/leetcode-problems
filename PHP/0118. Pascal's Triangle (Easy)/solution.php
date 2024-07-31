<?php

class Solution
{
    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows)
    {
        $triangle = [];

        for ($i = 0; $i < $numRows; $i++) {
            $row = [];
            for ($j = 0; $j <= $i; $j++) {
                if ($j == 0 || $j == $i) {
                    $row[] = 1;
                } else {
                    $row[] = $triangle[$i - 1][$j - 1] + $triangle[$i - 1][$j];
                }
            }
            $triangle[] = $row;
        }

        return $triangle;
    }
}
