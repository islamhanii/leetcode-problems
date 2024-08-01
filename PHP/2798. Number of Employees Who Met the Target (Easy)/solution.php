<?php

class Solution
{
    /**
     * @param Int[] $hours
     * @param Integer $target
     * @return Integer
     */
    function numberOfEmployeesWhoMetTarget($hours, $target)
    {
        sort($hours);
        foreach ($hours as $index => $hour) {
            if ($hour >= $target) {
                return count($hours) - $index;
            }
        }

        return 0;
    }
}
