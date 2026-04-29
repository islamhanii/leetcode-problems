# Write your MySQL query statement below
WITH efficiency AS(
    SELECT
        drivers.driver_id,
        driver_name,
        AVG(
            CASE
                WHEN trip_date < '2023-07-01' THEN distance_km / fuel_consumed
            END
        ) AS first_half_avg,
        AVG(
            CASE
                WHEN trip_date >= '2023-07-01' THEN distance_km / fuel_consumed
            END
        ) AS second_half_avg
    FROM
        drivers
        JOIN trips ON drivers.driver_id = trips.driver_id
    GROUP BY
        drivers.driver_id,
        driver_name
)
SELECT
    driver_id,
    driver_name,
    ROUND(first_half_avg, 2) AS first_half_avg,
    ROUND(second_half_avg, 2) AS second_half_avg,
    ROUND(second_half_avg - first_half_avg, 2) AS efficiency_improvement
FROM
    efficiency
WHERE
    first_half_avg IS NOT NULL
    AND second_half_avg IS NOT NULL
HAVING
    efficiency_improvement > 0
ORDER BY
    efficiency_improvement DESC,
    driver_name;