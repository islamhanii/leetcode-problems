<?php

class Solution
{
    /**
     * @param Int $x
     * @return Int
     */
    function reverse($x)
    {
        $value = ($x < 0) ? (-1 * (int)strrev("" . $x * -1 . "")) : (int)strrev("$x");

        return ($value > 2147483647 || $value < -2147483647) ? 0 : $value;
    }
}
