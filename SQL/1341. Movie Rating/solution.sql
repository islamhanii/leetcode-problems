# Write your MySQL query statement below
(
    SELECT
        name AS results
    FROM
        Users
        JOIN MovieRating ON Users.user_id = MovieRating.user_id
    GROUP BY
        Users.user_id
    ORDER BY
        COUNT(*) DESC,
        name
    LIMIT
        1
)
UNION
ALL (
    SELECT
        title AS results
    FROM
        Movies
        JOIN MovieRating ON Movies.movie_id = MovieRating.movie_id
    WHERE
        created_at >= "2020-02-01"
        AND created_at < "2020-03-01"
    GROUP BY
        Movies.movie_id
    ORDER BY
        AVG(rating) DESC,
        title
    LIMIT
        1
);