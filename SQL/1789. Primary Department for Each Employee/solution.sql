# Write your MySQL query statement below
SELECT
    employee_id,
    department_id
FROM
    Employee AS Employee1
WHERE
    primary_flag = 'Y'
    OR (
        SELECT
            COUNT(*)
        FROM
            Employee AS Employee2
        WHERE
            Employee1.employee_id = Employee2.employee_id
    ) = 1