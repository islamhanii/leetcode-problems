# Write your MySQL query statement below
SELECT
    SalesPerson.name
FROM
    SalesPerson
    LEFT JOIN Orders ON SalesPerson.sales_id = Orders.sales_id
    LEFT JOIN Company ON Orders.com_id = Company.com_id
    AND Company.name = "RED"
GROUP BY
    SalesPerson.sales_id
HAVING
    COUNT(Company.com_id) = 0;