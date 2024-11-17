# Write your MySQL query statement below
SELECT
    Sales.product_id,
    FirstYearSales.first_year,
    Sales.quantity,
    Sales.price
FROM
    (
        SELECT
            product_id,
            MIN(year) AS first_year
        FROM
            Sales
        GROUP BY
            product_id
    ) FirstYearSales
    JOIN Sales ON FirstYearSales.product_id = Sales.product_id
    AND FirstYearSales.first_year = Sales.year;