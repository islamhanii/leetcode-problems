<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s)
    {
        $charCount = array_fill(0, 26, 0);

        for ($i = 0; $i < strlen($s); $i++) {
            $charCount[ord($s[$i]) - ord('a')]++;
        }

        for ($i = 0; $i < strlen($s); $i++) {
            if ($charCount[ord($s[$i]) - ord('a')] === 1) {
                return $i;
            }
        }

        return -1;
    }
}
