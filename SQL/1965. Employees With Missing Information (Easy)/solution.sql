# Write your MySQL query statement below
SELECT
    Employees.employee_id
FROM
    Employees
    LEFT JOIN Salaries ON Employees.employee_id = Salaries.employee_id
WHERE
    Salaries.employee_id IS NULL
UNION
SELECT
    Salaries.employee_id
FROM
    Salaries
    LEFT JOIN Employees ON Salaries.employee_id = Employees.employee_id
WHERE
    Employees.employee_id IS NULL
ORDER BY
    employee_id