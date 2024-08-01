# Write your MySQL query statement below
WITH AllCombinations AS (
    SELECT
        Students.student_id,
        Students.student_name,
        Subjects.subject_name
    FROM
        Students
        CROSS JOIN Subjects
)
SELECT
    AllCombinations.student_id,
    AllCombinations.student_name,
    AllCombinations.subject_name,
    COUNT(Examinations.student_id) AS attended_exams
FROM
    AllCombinations
    LEFT JOIN Examinations ON AllCombinations.student_id = Examinations.student_id
    AND AllCombinations.subject_name = Examinations.subject_name
GROUP BY
    AllCombinations.student_id,
    AllCombinations.student_name,
    AllCombinations.subject_name
ORDER BY
    AllCombinations.student_id,
    AllCombinations.subject_name;