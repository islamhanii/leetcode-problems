# Write your MySQL query statement below
SELECT
    e.name AS name
FROM
    Employee e
JOIN
    (
        SELECT
            managerId,
            COUNT(id) AS direct_reports
        FROM
            Employee
        WHERE
            managerId IS NOT NULL
        GROUP BY
            managerId
        HAVING
            COUNT(id) >= 5
    ) m
ON
    e.id = m.managerId;