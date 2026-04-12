CREATE FUNCTION getNthHighestSalary(N INT) RETURNS INT
BEGIN
    RETURN (
        # Write your MySQL query statement below.
        SELECT salary
        FROM (
            SELECT
                (DENSE_RANK() OVER(ORDER BY salary DESC)) AS `rank`,
                salary
            FROM Employee
        ) AS ranks
        WHERE `rank` = N
        LIMIT 1
    );
END