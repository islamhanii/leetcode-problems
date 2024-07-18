<?php

class Solution
{
    /**
     * @param Int $x
     * @return Boolean
     */
    function isPalindrome($x)
    {
        if ($x < 0 || ($x % 10 == 0 && $x!= 0)) return false;
        
        return (((int)strrev("$x")) == $x) ? true : false;
    }
}
