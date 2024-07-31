<?php

class Solution
{
    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t)
    {
        if ($s === "" || $s === $t) return true;

        $sIndex = 0;

        for ($tIndex = 0; $tIndex < strlen($t); $tIndex++) {
            if ($s[$sIndex] === $t[$tIndex]) {
                $sIndex++;
            }

            if ($sIndex === strlen($s)) {
                return true;
            }
        }

        return false;
    }
}
