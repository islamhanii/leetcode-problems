# Write your MySQL query statement below
WITH session_stats AS (
    SELECT
        session_id,
        user_id,
        TIMESTAMPDIFF(
            MINUTE,
            MIN(event_timestamp),
            MAX(event_timestamp)
        ) AS duration,
        SUM(event_type = 'scroll') AS scroll_count,
        SUM(event_type = 'click') AS click_count,
        SUM(event_type = 'purchase') AS purchase_count
    FROM
        app_events
    GROUP BY
        session_id,
        user_id
)
SELECT
    session_id,
    user_id,
    duration AS session_duration_minutes,
    scroll_count
FROM
    session_stats
WHERE
    duration > 30
    AND scroll_count >= 5
    AND purchase_count = 0
    AND click_count / scroll_count < 0.2
ORDER BY
    scroll_count DESC,
    session_id;