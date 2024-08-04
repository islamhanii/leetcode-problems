# Write your MySQL query statement below
WITH FirstOrders AS (
    SELECT
        delivery_id,
        customer_id,
        order_date,
        customer_pref_delivery_date,
        CASE
            WHEN order_date = customer_pref_delivery_date THEN 'immediate'
            ELSE 'scheduled'
        END AS status
    FROM
        Delivery
    WHERE
        (customer_id, order_date) IN (
            SELECT
                customer_id,
                MIN(order_date) AS first_order_date
            FROM
                Delivery
            GROUP BY
                customer_id
        )
)
SELECT
    ROUND(
        SUM(
            CASE
                WHEN status = 'immediate' THEN 1
                ELSE 0
            END
        ) / COUNT(*) * 100,
        2
    ) AS immediate_percentage
FROM
    FirstOrders;