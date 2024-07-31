<?php

class Solution
{
    /**
     * @param Int[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        $totalProfit = 0;
        $n = count($prices);
        
        for ($i = 1; $i < $n; $i++) {
            if ($prices[$i] > $prices[$i - 1]) {
                $totalProfit += $prices[$i] - $prices[$i - 1];
            }
        }

        return $totalProfit;
    }
}
