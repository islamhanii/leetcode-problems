<?php

class Solution
{
    /**
     * @param Integer[][] $mat
     * @param Int $r
     * @param Int $c
     * @return Integer[][]
     */
    function matrixReshape($mat, $r, $c)
    {
        $rows = count($mat);
        $cols = count($mat[0]);
        if (($rows * $cols != $r * $c) || ($rows == $r && $cols == $c)) {
            return $mat;
        }

        $result = array_fill(0, $r, array_fill(0, $c, 0));
        $index = 0;

        foreach ($mat as $row) {
            foreach ($row as $num) {
                $result[floor($index / $c)][$index % $c] = $num;
                $index++;
            }
        }

        return $result;
    }
}
