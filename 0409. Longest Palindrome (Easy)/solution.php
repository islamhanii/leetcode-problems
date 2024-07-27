<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindrome($s)
    {
        $charCounts = array_count_values(str_split($s));
        $length = 0;
        $oddCountExists = false;

        foreach ($charCounts as $count) {
            if ($count % 2 == 0) {
                $length += $count;
            } else {
                $length += $count - 1;
                $oddCountExists = true;
            }
        }

        if ($oddCountExists) {
            $length += 1;
        }

        return $length;
    }
}
