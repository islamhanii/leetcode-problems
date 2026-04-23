WITH Total AS (
    SELECT
        COUNT(*) AS total
    FROM
        SEAT
)
SELECT
    CASE
        WHEN id < total
        OR total % 2 = 0 THEN CASE
            WHEN id % 2 = 0 THEN id - 1
            ELSE id + 1
        END
        ELSE id
    END AS id,
    student
FROM
    SEAT
    CROSS JOIN Total
ORDER BY
    id;