# Write your MySQL query statement below
SELECT
    name,
    bonus
FROM
    Employee
    LEFT JOIN Bonus ON Employee.empId = Bonus.empId
WHERE
    Bonus < 1000
    OR Bonus.empId IS NULL