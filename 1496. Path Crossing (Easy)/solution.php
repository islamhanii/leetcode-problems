<?php

class Solution
{

    /**
     * @param String $path
     * @return Boolean
     */
    function isPathCrossing($path)
    {
        $x = 0;
        $y = 0;
        $visited = [];
        $visited[implode(',', [$x, $y])] = true;

        foreach (str_split($path) as $direction) {
            switch ($direction) {
                case 'N':
                    $y++;
                    break;
                case 'S':
                    $y--;
                    break;
                case 'E':
                    $x++;
                    break;
                case 'W':
                    $x--;
                    break;
            }

            $currentPosition = implode(',', [$x, $y]);
            if (isset($visited[$currentPosition])) {
                return true;
            }
            $visited[$currentPosition] = true;
        }

        return false;
    }
}
