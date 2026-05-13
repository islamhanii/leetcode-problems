<?php

// This is Limited Time Execeded Solution, but it is correct and can be optimized with memoization.

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function maxValue($nums)
    {
        $n = count($nums);
        $answer = $nums;
        $graph = array_fill(0, $n, []);

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if (
                    ($j > $i && $nums[$j] < $nums[$i]) ||
                    ($j < $i && $nums[$j] > $nums[$i])
                ) {
                    $graph[$i][] = $j;
                }
            }
        }

        for ($start = 0; $start < $n; $start++) {
            $queue = [$start];
            $visited = array_fill(0, $n, false);

            $visited[$start] = true;

            while (!empty($queue)) {
                $current = array_shift($queue);
                $answer[$start] = max($answer[$start], $nums[$current]);

                foreach ($graph[$current] as $next) {
                    if (!$visited[$next]) {
                        $visited[$next] = true;
                        $queue[] = $next;
                    }
                }
            }
        }

        return $answer;
    }
}
