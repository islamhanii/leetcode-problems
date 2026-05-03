<?php

class Solution
{

    /**
     * @param String $s
     * @param String $goal
     * @return Boolean
     */
    function rotateString($s, $goal)
    {
        // $sLen = strlen($s);
        // $goalLen = strlen($goal);
        // if($sLen != $goalLen) return false;
        // for($i=0; $i<$sLen; $i++)
        // {
        //     if($s[$i] == $goal[0]) {
        //         $newS = substr($s, $i) . substr($s, 0, $i);
        //         if($newS == $goal) return true;
        //     }
        // }

        // return false;

        if (strlen($s) != strlen($goal)) return false;

        return strpos($s . $s, $goal) !== false;
    }
}
