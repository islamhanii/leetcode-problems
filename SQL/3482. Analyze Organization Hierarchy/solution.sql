# Write your MySQL query statement below
WITH RECURSIVE TreeDepth AS (
    SELECT
        employee_id,
        employee_name,
        1 AS level
    FROM
        Employees
    WHERE
        manager_id IS NULL
    UNION
    ALL
    SELECT
        Employees.employee_id,
        Employees.employee_name,
        TreeDepth.level + 1
    FROM
        Employees
        INNER JOIN TreeDepth ON Employees.manager_id = TreeDepth.employee_id
),
Subtree AS (
    SELECT
        employee_id,
        employee_id AS manager_id,
        salary
    FROM
        Employees
    UNION
    ALL
    SELECT
        Employees.employee_id,
        Subtree.manager_id,
        Employees.salary
    FROM
        Employees
        INNER JOIN Subtree ON Employees.manager_id = Subtree.employee_id
)
SELECT
    TreeDepth.employee_id,
    employee_name,
    level,
    COUNT(manager_id) - 1 AS team_size,
    SUM(salary) AS budget
FROM
    TreeDepth
    JOIN Subtree ON TreeDepth.employee_id = Subtree.employee_id
GROUP BY
    manager_id
ORDER BY
    level,
    budget DESC,
    employee_name;