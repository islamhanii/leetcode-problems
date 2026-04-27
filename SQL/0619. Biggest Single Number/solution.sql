# Write your MySQL query statement below
WITH unrepeated_nums AS (
    SELECT
        num
    FROM
        MyNumbers
    GROUP BY
        num
    HAVING
        COUNT(*) = 1
)
SELECT
    MAX(num) AS num
FROM
    unrepeated_nums;