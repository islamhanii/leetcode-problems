<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s)
    {
        $words = explode(' ', trim($s));
        $length = count($words);

        if ($length == 0) return 0;

        return strlen($words[$length - 1]);
    }
}
