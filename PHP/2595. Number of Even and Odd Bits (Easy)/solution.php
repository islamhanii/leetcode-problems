<?php

class Solution
{
    function toBinary($number)
    {
        if ($number == 1) {
            return "1";
        }

        $reminder = $number % 2;

        return "$reminder" . $this->toBinary((int)($number / 2));
    }

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function evenOddBit($n)
    {
        $odd = 0;
        $even = 0;
        $binary = $this->toBinary($n);

        for ($i = 0; $i < strlen($binary); $i++) {
            if ($binary[$i] == "1") {
                ($i % 2 == 1) ? $odd++ : $even++;
            }
        }

        return [$even, $odd];
    }
}
