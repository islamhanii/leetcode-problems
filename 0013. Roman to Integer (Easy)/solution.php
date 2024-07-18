<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s)
    {
        $map = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000
        ];
        $result = 0;
        $length = strlen($s);

        for ($i = 0; $i < $length; $i++) {
            if ($i < $length - 1 && $map[$s[$i]] < $map[$s[$i + 1]]) {
                $result -= $map[$s[$i]];
            } else {
                $result += $map[$s[$i]];
            }
        }

        if ($result < 0 || $result > 3999) {
            return 0;
        }

        return $result;
    }
}
