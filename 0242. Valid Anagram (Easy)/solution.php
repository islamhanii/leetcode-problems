<?php

class Solution
{
    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t)
    {
        if (strlen($s) !== strlen($t)) {
            return false;
        }

        $charCount = array_fill(0, 26, 0);

        for ($i = 0; $i < strlen($s); $i++) {
            $charCount[ord($s[$i]) - ord('a')]++;
            $charCount[ord($t[$i]) - ord('a')]--;
        }

        if (max($charCount) > 0 && min($charCount) < 0) {
            return false;
        }

        return true;
    }
}
