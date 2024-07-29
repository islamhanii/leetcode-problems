<?php

/* The isBadVersion API is defined in the parent class VersionControl.
      public function isBadVersion($version){} */

class Solution extends VersionControl
{
    /**
     * @param Int $n
     * @return Integer
     */
    function firstBadVersion($n)
    {
        $left = 1;
        $right = $n;

        while ($left < $right) {
            $mid = floor($left + ($right - $left) / 2);

            if ($this->isBadVersion($mid)) $right = $mid;
            else $left = $mid + 1;
        }

        return $left;
    }
}
