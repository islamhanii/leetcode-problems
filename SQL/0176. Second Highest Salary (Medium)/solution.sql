# Write your MySQL query statement below
SELECT
    CASE
        WHEN COUNT(DISTINCT salary) < 2 THEN NULL
        ELSE (
            SELECT
                DISTINCT salary
            FROM
                Employee
            ORDER BY
                salary DESC
            LIMIT
                1 OFFSET 1
        )
    END AS SecondHighestSalary
FROM
    Employee;