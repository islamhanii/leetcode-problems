# Write your MySQL query statement below
WITH AllRequests AS (
    SELECT
        requester_id AS id
    FROM
        RequestAccepted
    UNION
    ALL
    SELECT
        accepter_id AS id
    FROM
        RequestAccepted
)
SELECT
    id,
    COUNT(id) AS num
FROM
    AllRequests
GROUP BY
    id
ORDER BY
    num DESC
LIMIT
    1;