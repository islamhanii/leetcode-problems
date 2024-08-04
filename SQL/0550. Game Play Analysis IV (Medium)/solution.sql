# Write your MySQL query statement below
WITH FirstLogin AS (
    SELECT
        player_id,
        MIN(event_date) AS first_login_date
    FROM
        Activity
    GROUP BY
        player_id
),
ConsecutiveLogins AS (
    SELECT
        DISTINCT a.player_id
    FROM
        Activity a
        JOIN FirstLogin f ON a.player_id = f.player_id
        AND a.event_date = DATE_ADD(f.first_login_date, INTERVAL 1 DAY)
)
SELECT
    ROUND(
        COUNT(DISTINCT c.player_id) / COUNT(DISTINCT f.player_id),
        2
    ) AS fraction
FROM
    FirstLogin f
    LEFT JOIN ConsecutiveLogins c ON f.player_id = c.player_id;