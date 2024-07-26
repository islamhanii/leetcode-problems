<?php

class Solution
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2)
    {
        $result = [];
        $count = [];

        foreach ($nums1 as $num) {
            if (isset($count[$num])) {
                $count[$num]++;
            } else {
                $count[$num] = 1;
            }
        }
        
        foreach ($nums2 as $num) {
            if (isset($count[$num]) && $count[$num] > 0) {
                $result[] = $num;
                $count[$num]--;
            }
        }
        
        return $result;
    }
}
