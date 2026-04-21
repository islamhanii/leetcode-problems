# Write your MySQL query statement below
SELECT
    ip,
    COUNT(*) AS invalid_count
FROM
    logs
WHERE
    INET_ATON(ip) IS NULL
    OR ip LIKE "0%"
    OR ip LIKE "%.0%"
    OR LENGTH(ip) - LENGTH(REPLACE(ip, '.', '')) != 3
GROUP BY
    ip
ORDER BY
    invalid_count DESC,
    ip DESC;