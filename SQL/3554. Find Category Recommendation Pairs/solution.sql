# Write your MySQL query statement below
WITH user_category AS (
    SELECT
        user_id,
        category
    FROM
        ProductPurchases
        JOIN ProductInfo ON ProductPurchases.product_id = ProductInfo.product_id
)
SELECT
    user_category1.category AS category1,
    user_category2.category AS category2,
    COUNT(DISTINCT user_category1.user_id) AS customer_count
FROM
    user_category AS user_category1
    JOIN user_category AS user_category2 ON user_category1.category < user_category2.category
    AND user_category1.user_id = user_category2.user_id
GROUP BY
    category1,
    category2
HAVING
    COUNT(DISTINCT user_category1.user_id) >= 3
ORDER BY
    customer_count DESC,
    category1,
    category2;