<?php
class Solution
{

    /**
     * @param String[][] $boxGrid
     * @return String[][]
     */
    function rotateTheBox($boxGrid)
    {
        $rows = count($boxGrid);
        $cols = count($boxGrid[0]);
        $initBox = array_fill(0, $cols, array_fill(0, $rows, '.'));
        for ($i = 0; $i < $rows; $i++) {
            $empty = $cols - 1;
            for ($j = $cols - 1; $j >= 0; $j--) {
                if ($boxGrid[$i][$j] === '#') {
                    $initBox[$empty--][$rows - 1 - $i] = '#';
                } else if ($boxGrid[$i][$j] === '*') {
                    $initBox[$j][$rows - 1 - $i] = '*';
                    $empty = $j - 1;
                }
            }
        }

        return $initBox;
    }
}
