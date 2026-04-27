# Write your MySQL query statement below
WITH streaks AS (
    SELECT
        user_id,
        action,
        COUNT(action) AS streak_length
    FROM
        activity
    GROUP BY
        user_id,
        action
),
intervals AS (
    SELECT
        user_id,
        action,
        MIN(action_date) OVER(PARTITION BY user_id, action) AS start_date,
        MAX(action_date) OVER(PARTITION BY user_id, action) AS end_date
    FROM
        activity
)
SELECT
    DISTINCT streaks.user_id,
    streaks.action,
    streak_length,
    start_date,
    end_date
FROM
    streaks
    JOIN intervals ON streaks.user_id = intervals.user_id
    AND streaks.action = intervals.action
WHERE
    streak_length >= 5
ORDER BY
    streak_length DESC,
    user_id;