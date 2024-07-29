<?php

class Solution
{
    /**
     * @param Int[] $arr
     * @return Boolean
     */
    function checkIfExist($arr)
    {
        $map = [];

        foreach ($arr as $num) {

            if (isset($map["" . $num * 2 . ""]) || isset($map["" . $num / 2 . ""])) return true;
            $map["$num"] = true;
        }

        return false;
    }
}
