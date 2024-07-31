<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        $longestLength = 0;
        $length = strlen($s);

        for ($i = 0; $i < $length; $i++) {
            if (($length - $i) <= $longestLength) break;
            $arr = [$s[$i]];
            $count = 1;
            for ($j = $i + 1; $j < $length; $j++) {
                if (in_array($s[$j], $arr)) break;
                array_push($arr, $s[$j]);
                $count++;
            }

            $longestLength = ($count > $longestLength) ? $count : $longestLength;
        }

        return $longestLength;
    }
}
