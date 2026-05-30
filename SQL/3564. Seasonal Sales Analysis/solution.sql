# Write your MySQL query statement below
WITH filtered AS (
    SELECT
        (
            CASE
                WHEN sale_date REGEXP '-12-|-01-|-02-' THEN 'Winter'
                WHEN sale_date REGEXP '-03-|-04-|-05-' THEN 'Spring'
                WHEN sale_date REGEXP '-06-|-07-|-08-' THEN 'Summer'
                ELSE 'Fall'
            END
        ) AS season,
        category,
        SUM(quantity) AS total_quantity,
        SUM(quantity * price) AS total_revenue
    FROM
        sales
        JOIN products ON sales.product_id = products.product_id
    GROUP BY
        season,
        category
)
SELECT
    DISTINCT season,
    FIRST_VALUE(category) OVER(
        PARTITION BY season
        ORDER BY
            total_quantity DESC,
            total_revenue DESC,
            category ASC
    ) AS category,
    FIRST_VALUE(total_quantity) OVER(
        PARTITION BY season
        ORDER BY
            total_quantity DESC,
            total_revenue DESC,
            category ASC
    ) AS total_quantity,
    FIRST_VALUE(total_revenue) OVER(
        PARTITION BY season
        ORDER BY
            total_quantity DESC,
            total_revenue DESC,
            category ASC
    ) AS total_revenue
FROM
    filtered;