<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s)
    {
        $words = explode(' ', trim($s));

        $reversedWords = array_map('strrev', $words);

        return implode(' ', $reversedWords);
    }
}
