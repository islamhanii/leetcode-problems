# Write your MySQL query statement below
SELECT
    request_at AS `Day`,
    ROUND(
        SUM(
            CASE
                WHEN status LIKE "cancelled%" THEN 1
                ELSE 0
            END
        ) / COUNT(*),
        2
    ) AS `Cancellation Rate`
FROM
    Trips
    JOIN Users AS Clients ON Trips.client_id = Clients.users_id
    AND Clients.banned = "No"
    JOIN Users AS Drivers ON Trips.driver_id = Drivers.users_id
    AND Drivers.banned = "No"
WHERE
    request_at BETWEEN '2013-10-01'
    AND '2013-10-03'
GROUP BY
    request_at