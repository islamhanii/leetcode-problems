# Write your MySQL query statement below
WITH report AS (
    SELECT
        DISTINCT stores.store_id,
        store_name,
        location,
        FIRST_VALUE(product_name) OVER(
            PARTITION BY stores.store_id
            ORDER BY
                price DESC
        ) AS most_exp_product,
        FIRST_VALUE(product_name) OVER(
            PARTITION BY stores.store_id
            ORDER BY
                price
        ) AS cheapest_product,
        FIRST_VALUE(quantity) OVER(
            PARTITION BY stores.store_id
            ORDER BY
                price DESC
        ) most_exp_quantity,
        FIRST_VALUE(quantity) OVER(
            PARTITION BY stores.store_id
            ORDER BY
                price
        ) AS cheapest_quantity,
        (COUNT(*) OVER(PARTITION BY stores.store_id)) AS products_count
    FROM
        stores
        JOIN inventory ON stores.store_id = inventory.store_id
)
SELECT
    store_id,
    store_name,
    location,
    most_exp_product,
    cheapest_product,
    ROUND(cheapest_quantity / most_exp_quantity, 2) AS imbalance_ratio
FROM
    report
WHERE
    cheapest_quantity > most_exp_quantity
    AND products_count >= 3
ORDER BY
    imbalance_ratio DESC,
    store_name;