# Write your MySQL query statement below
WITH session_gaps AS (
    SELECT
        session_id,
        student_id,
        subject,
        ROW_NUMBER() OVER(
            PARTITION BY student_id
            ORDER BY
                session_id
        ) AS session_number,
        DATEDIFF(
            COALESCE(
                LEAD(session_date) OVER(
                    PARTITION BY student_id
                    ORDER BY
                        session_id
                ),
                session_date
            ),
            session_date
        ) AS gap,
        hours_studied
    FROM
        study_sessions
    ORDER BY
        session_id
),
uncycled_sessions AS (
    SELECT
        students.student_id,
        students.student_name,
        students.major,
        COUNT(DISTINCT subject) AS cycle_length,
        SUM(hours_studied) AS total_study_hours
    FROM
        students
        JOIN session_gaps ON students.student_id = session_gaps.student_id
    WHERE
        gap <= 2
    GROUP BY
        student_id
    HAVING
        cycle_length >= 3
        AND COUNT(*) / cycle_length >= 2
    ORDER BY
        cycle_length DESC,
        total_study_hours DESC
)
SELECT
    *
FROM
    uncycled_sessions
WHERE
    cycle_length = (
        SELECT
            COUNT(DISTINCT subject, session_number % cycle_length)
        FROM
            session_gaps
        WHERE
            uncycled_sessions.student_id = session_gaps.student_id
    )