# Write your MySQL query statement below
SELECT
    customer_id
FROM
    customer_transactions
GROUP BY
    customer_id
HAVING
    COUNT(*) >= 3
    AND DATEDIFF(MAX(transaction_date), MIN(transaction_date)) >= 30
    AND SUM(
        CASE
            WHEN transaction_type = 'refund' THEN 1
            ELSE 0
        END
    ) / COUNT(*) < 0.2;