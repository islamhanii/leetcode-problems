<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function partitionString($s)
    {
        $counter = 1;
        $array = [];
        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            if (isset($array[$char])) {
                $array = [];
                $counter++;
            }

            $array[$char] = true;
        }

        return $counter;
    }
}
