# Write your MySQL query statement below
SELECT
    DISTINCT sell_date,
    COUNT(DISTINCT product) AS num_sold,
    GROUP_CONCAT(
        DISTINCT product
        order by
            product
    ) AS products
FROM
    Activities
GROUP BY
    sell_date