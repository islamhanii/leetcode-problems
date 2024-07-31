<?php

class Solution
{
    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target)
    {
        $rows = count($matrix);
        if ($rows === 0) return false;

        $columns = count($matrix[0]);

        $startRow = 0;
        $endRow = $rows - 1;
        while ($startRow <= $endRow) {
            $middleRow = floor(($startRow + $endRow) / 2);
            if ($matrix[$middleRow][0] <= $target && $target <= $matrix[$middleRow][$columns - 1]) {
                break;
            }
            if ($matrix[$middleRow][0] > $target) {
                $endRow = $middleRow - 1;
            } else {
                $startRow = $middleRow + 1;
            }
        }

        if ($startRow > $endRow) {
            return false;
        }

        $row = $middleRow;
        $startColumn = 0;
        $endColumn = $columns - 1;
        while ($startColumn <= $endColumn) {
            $middleColumn = floor(($startColumn + $endColumn) / 2);
            if ($matrix[$row][$middleColumn] == $target) {
                return true;
            } elseif ($matrix[$row][$middleColumn] < $target) {
                $startColumn = $middleColumn + 1;
            } else {
                $endColumn = $middleColumn - 1;
            }
        }

        return false;
    }
}
