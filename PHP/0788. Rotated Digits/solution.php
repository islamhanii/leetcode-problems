<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function rotatedDigits($n)
    {
        $count = 0;

        for ($i = 1; $i <= $n; $i++) {
            $num = $i;
            $isValid = true;
            $isDifferent = false;

            while ($num > 0) {
                $digit = $num % 10;

                if ($digit == 3 || $digit == 4 || $digit == 7) {
                    $isValid = false;
                    break;
                }

                if ($digit == 2 || $digit == 5 || $digit == 6 || $digit == 9) {
                    $isDifferent = true;
                }

                $num = intdiv($num, 10);
            }

            if ($isValid && $isDifferent) {
                $count++;
            }
        }

        return $count;
    }
}
