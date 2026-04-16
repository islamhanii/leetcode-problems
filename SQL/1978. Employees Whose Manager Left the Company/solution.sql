# Write your MySQL query statement below
SELECT
    Employees1.employee_id
FROM
    Employees AS Employees1
    LEFT JOIN Employees AS Employees2 ON Employees1.manager_id = Employees2.employee_id
WHERE
    Employees1.manager_id IS NOT NULL
    AND Employees2.employee_id IS NULL
    AND Employees1.salary < 30000
ORDER BY
    Employees1.employee_id;