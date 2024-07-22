<?php

class Solution
{
    /**
     * @param Integer[] $nums1
     * @param Int $m
     * @param Integer[] $nums2
     * @param Int $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n)
    {
        $index = $m + $n - 1;
        $i = $m - 1;
        $j = $n - 1;

        while ($i >= 0 && $j >= 0) {
            if ($nums1[$i] > $nums2[$j]) {
                $nums1[$index--] = $nums1[$i--];
            } else {
                $nums1[$index--] = $nums2[$j--];
            }
        }

        while ($j >= 0) {
            $nums1[$index--] = $nums2[$j--];
        }
    }
}
