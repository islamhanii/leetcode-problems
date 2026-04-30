# Write your MySQL query statement below
SELECT
    ProductPurchases1.product_id AS product1_id,
    ProductPurchases2.product_id AS product2_id,
    ProductInfo1.category AS product1_category,
    ProductInfo2.category AS product2_category,
    COUNT(*) AS customer_count
FROM
    ProductPurchases AS ProductPurchases1
    JOIN ProductPurchases AS ProductPurchases2 ON ProductPurchases1.user_id = ProductPurchases2.user_id
    AND ProductPurchases1.product_id < ProductPurchases2.product_id
    JOIN ProductInfo AS ProductInfo1 ON ProductPurchases1.product_id = ProductInfo1.product_id
    JOIN ProductInfo AS ProductInfo2 ON ProductPurchases2.product_id = ProductInfo2.product_id
GROUP BY
    product1_id,
    product2_id,
    product1_category,
    product2_category
HAVING
    customer_count >= 3
ORDER BY
    customer_count DESC,
    product1_id,
    product2_id;