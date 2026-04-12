# Write your MySQL query statement below
SELECT
    DISTINCT Logs1.num AS ConsecutiveNums
FROM
    Logs AS Logs1,
    Logs AS Logs2,
    Logs AS Logs3
WHERE
    Logs1.id = Logs2.id + 1
    AND Logs2.id = Logs3.id + 1
    AND Logs1.num = Logs2.num
    AND Logs2.num = Logs3.num;