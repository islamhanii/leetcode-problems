# Write your MySQL query statement below
SELECT
    DISTINCT Stadium1.id,
    Stadium1.visit_date,
    Stadium1.people
FROM
    Stadium AS Stadium1,
    Stadium AS Stadium2,
    Stadium AS Stadium3
WHERE
    Stadium1.people >= 100
    AND Stadium2.people >= 100
    AND Stadium3.people >= 100
    AND (
        (
            Stadium1.id = Stadium2.id - 1
            AND Stadium1.id = Stadium3.id - 2
        )
        OR (
            Stadium1.id = Stadium2.id + 1
            AND Stadium1.id = Stadium3.id - 1
        )
        OR (
            Stadium1.id = Stadium2.id + 2
            AND Stadium1.id = Stadium3.id + 1
        )
    )
ORDER BY
    Stadium1.visit_date;