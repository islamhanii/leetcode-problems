# Write your MySQL query statement below
SELECT
    DISTINCT T1.id,
    (
        CASE
            WHEN (T1.p_id IS NULL) THEN "Root"
            WHEN (T2.id IS NULL) THEN "Leaf"
            ELSE "Inner"
        END
    ) AS type
FROM
    Tree T1
    LEFT JOIN Tree T2 ON T1.id = T2.p_id