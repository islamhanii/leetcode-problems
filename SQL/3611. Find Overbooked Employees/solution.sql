# Write your MySQL query statement below
WITH pivot AS (
    SELECT
        employees.employee_id,
        employees.employee_name,
        employees.department,
        YEARWEEK(meeting_date, 1) AS `week`,
        SUM(duration_hours) AS `total_hours`
    FROM
        employees
        JOIN meetings ON employees.employee_id = meetings.employee_id
    GROUP BY
        employee_id,
        employee_name,
        department,
        `week`
)
SELECT
    employee_id,
    employee_name,
    department,
    SUM(`total_hours` > 20) AS meeting_heavy_weeks
FROM
    pivot
GROUP BY
    employee_id,
    employee_name,
    department
HAVING
    meeting_heavy_weeks > 1
ORDER BY
    meeting_heavy_weeks DESC,
    employee_name;