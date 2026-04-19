# Write your MySQL query statement below
WITH RankedDepartmentSalary AS (
    SELECT
        Department.name AS Department,
        Employee.name AS Employee,
        salary AS Salary,
        DENSE_RANK() OVER(
            PARTITION BY Department.name
            ORDER BY
                salary DESC
        ) AS `rank`
    FROM
        Employee
        JOIN Department ON Employee.departmentId = Department.id
)
SELECT
    Department,
    Employee,
    Salary
FROM
    RankedDepartmentSalary
WHERE
    `rank` <= 3;