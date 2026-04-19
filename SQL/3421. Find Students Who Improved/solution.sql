# Write your MySQL query statement below
WITH FirstLatestScores AS (
    SELECT
        DISTINCT student_id,
        subject,
        FIRST_VALUE(score) OVER (
            PARTITION BY student_id,
            subject
            ORDER BY
                exam_date
        ) AS first_score,
        FIRST_VALUE(score) OVER (
            PARTITION BY student_id,
            subject
            ORDER BY
                exam_date DESC
        ) AS latest_score
    FROM
        Scores
)
SELECT
    *
FROM
    FirstLatestScores
WHERE
    first_score < latest_score
ORDER BY
    student_id,
    subject;