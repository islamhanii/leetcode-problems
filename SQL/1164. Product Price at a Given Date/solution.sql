# Write your MySQL query statement below
WITH known_products AS (
    SELECT
        DISTINCT product_id,
        FIRST_VALUE(new_price) OVER(
            PARTITION BY product_id
            ORDER BY
                change_date DESC
        ) AS price
    FROM
        Products
    WHERE
        change_date <= '2019-08-16'
)
SELECT
    DISTINCT Products.product_id,
    10 AS price
FROM
    Products
    LEFT JOIN known_products ON Products.product_id = known_products.product_id
WHERE
    known_products.product_id IS NULL
UNION
ALL
SELECT
    *
FROM
    known_products;