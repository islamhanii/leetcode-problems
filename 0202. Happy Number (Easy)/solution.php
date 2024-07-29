<?php

class Solution
{
    /**
     * @param Integer $n
     * @return Boolean
     */
    function isHappy($n, &$seen = [])
    {
        if ($n <= 0) return false;
        if ($n == 1) return true;

        $seen[$n] = true;
        $n = $this->digitSquareSum($n);

        if (isset($seen[$n])) {
            return false;
        }

        return $this->isHappy($n, $seen);
    }

    private function digitSquareSum($n)
    {
        $sum = 0;

        while ($n > 0) {
            $digit = $n % 10;
            $sum += $digit * $digit;
            $n = (int)($n / 10);
        }

        return $sum;
    }
}
