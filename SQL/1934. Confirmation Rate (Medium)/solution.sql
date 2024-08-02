# Write your MySQL query statement below
SELECT
    Signups.user_id,
    (
        COALESCE(
            ROUND(
                SUM(
                    CASE
                        WHEN Confirmations.action = "confirmed" THEN 1
                        ELSE 0
                    END
                ) / COUNT(Confirmations.user_id),
                2
            ),
            0
        )
    ) AS confirmation_rate
FROM
    Signups
    LEFT JOIN Confirmations ON Signups.user_id = Confirmations.user_id
GROUP BY
    user_id