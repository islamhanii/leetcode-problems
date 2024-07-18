<?php

class Solution
{

    /**
     * @param Int[] $nums1
     * @param Int[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        $nums = array_merge($nums1, $nums2);
        sort($nums);
        $length = count($nums);
        if ($length % 2) return $nums[$length / 2];
        return ($nums[$length / 2 - 1] + $nums[$length / 2]) / 2;
    }
}
