# Write your MySQL query statement below
SELECT
    Employee.name AS Employee
FROM
    Employee
    JOIN Employee AS Manager ON Employee.managerId = Manager.id
WHERE
    Employee.salary > Manager.salary;