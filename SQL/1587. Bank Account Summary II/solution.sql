# Write your MySQL query statement below
WITH Balances AS (
    SELECT
        account,
        SUM(amount) AS balance
    FROM
        Transactions
    GROUP BY
        account
)
SELECT
    name,
    balance
FROM
    Users
    JOIN Balances ON Users.account = Balances.account
WHERE
    balance > 10000;