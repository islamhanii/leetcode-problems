# Write your MySQL query statement below
WITH daily_amount AS(
    SELECT
        visited_on,
        sum(amount) AS amount,
        DENSE_RANK() OVER(
            ORDER BY
                visited_on
        ) AS `day`
    FROM
        Customer
    GROUP BY
        visited_on
    ORDER BY
        visited_on
),
unfiltered AS (
    SELECT
        visited_on,
        SUM(amount) OVER(
            ROWS BETWEEN 6 PRECEDING
            AND CURRENT ROW
        ) AS amount,
        ROUND(
            AVG(amount) OVER(
                ROWS BETWEEN 6 PRECEDING
                AND CURRENT ROW
            ),
            2
        ) AS average_amount,
        `day`
    FROM
        daily_amount
)
SELECT
    visited_on,
    amount,
    average_amount
FROM
    unfiltered
WHERE
    day > 6;