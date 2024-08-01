<?php

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    function areOccurrencesEqual($s)
    {
        $charCount = array_fill(0, 26, 0);
        $maxFrequency = 0;

        for ($i = 0; $i < strlen($s); $i++) {
            $charCount[ord($s[$i]) - ord('a')]++;
            if ($charCount[ord($s[$i]) - ord('a')] > $maxFrequency) {
                $maxFrequency = $charCount[ord($s[$i]) - ord('a')];
            }
        }

        for ($i = 0; $i < strlen($s); $i++) {
            if ($charCount[ord($s[$i]) - ord('a')] != $maxFrequency && $charCount[ord($s[$i]) - ord('a')] != 0) {
                return false;
            }
        }

        return true;
    }
}
