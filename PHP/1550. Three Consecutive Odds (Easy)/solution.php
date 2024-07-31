<?php

class Solution
{
    /**
     * @param Int[] $arr
     * @return Boolean
     */
    function threeConsecutiveOdds($arr)
    {
        $count = 0;

        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] % 2 == 1) {
                $count++;
                if ($count == 3) {
                    return true;
                }
            } else {
                $count = 0;
            }
        }

        return false;
    }
}
