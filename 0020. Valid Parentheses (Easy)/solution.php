<?php

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        $stack = [];
        $pairs = [
            ')' => '(',
            ']' => '[',
            '}' => '{'
        ];

        foreach (str_split($s) as $char) {
            if (in_array($char, ['(', '[', '{'])) {
                $stack[] = $char;
            } elseif (empty($stack) || $pairs[$char] !== array_pop($stack)) {
                return false;
            }
        }

        return empty($stack);
    }
}
