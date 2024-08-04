# Write your MySQL query statement below
SELECT
    contest_id,
    ROUND(
        SUM(
            CASE
                WHEN Register.user_id = Users.user_id THEN 1
                ELSE 0
            END
        ) / (
            SELECT
                COUNT(user_id)
            FROM
                Users
        ) * 100,
        2
    ) AS percentage
FROM
    Register
    JOIN Users ON Register.user_id = Users.user_id
GROUP BY
    contest_id
ORDER BY
    percentage DESC,
    contest_id ASC;