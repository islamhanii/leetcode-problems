<?php

class Solution
{
    private function isValid($board, $i, $j)
    {
        $num = $board[$i][$j];
        if ($num == '.') return true;

        for ($k = 0; $k < 9; $k++) {
            if (($board[$i][$k] == $num && $j != $k) || ($board[$k][$j] == $num && $i != $k)) return false;
        }

        $boxStartI = floor($i / 3) * 3;
        $boxStartJ = floor($j / 3) * 3;

        for ($k = 0; $k < 3; $k++) {
            for ($l = 0; $l < 3; $l++) {
                if ($board[$boxStartI + $k][$boxStartJ + $l] == $num && ($boxStartI + $k) != $i && ($boxStartJ + $l) != $j) return false;
            }
        }

        return true;
    }

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board)
    {
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if (!$this->isValid($board, $i, $j)) return false;
            }
        }

        return true;
    }
}
