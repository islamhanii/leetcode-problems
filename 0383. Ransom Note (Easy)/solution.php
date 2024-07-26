<?php

class Solution
{
    /**
     * @param String $ransomNote
     * @param String $magazine
     * @return Boolean
     */
    function canConstruct($ransomNote, $magazine)
    {
        $magazineCount = array_fill(0, 26, 0);
        $noteCount = array_fill(0, 26, 0);

        for ($i = 0; $i < strlen($magazine); $i++) {
            $magazineCount[ord($magazine[$i]) - ord('a')]++;
        }

        for ($i = 0; $i < strlen($ransomNote); $i++) {
            $noteCount[ord($ransomNote[$i]) - ord('a')]++;

            if ($noteCount[ord($ransomNote[$i]) - ord('a')] > $magazineCount[ord($ransomNote[$i]) - ord('a')]) {
                return false;
            }
        }

        return true;
    }
}
