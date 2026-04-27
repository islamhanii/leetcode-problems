# Write your MySQL query statement below
WITH report AS (
    SELECT
        person_name,
        SUM(weight) OVER(
            ORDER BY
                turn ROWS BETWEEN UNBOUNDED PRECEDING
                AND CURRENT ROW
        ) AS prev_total
    FROM
        Queue
    ORDER BY
        prev_total DESC
)
SELECT
    person_name
FROM
    report
WHERE
    prev_total <= 1000
LIMIT
    1;