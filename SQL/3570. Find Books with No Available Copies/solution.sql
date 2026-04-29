# Write your MySQL query statement below
WITH borrowed_books AS (
    SELECT
        library_books.book_id,
        total_copies,
        SUM(
            CASE
                WHEN return_date IS NULL THEN 1
                ELSE 0
            END
        ) AS current_borrowers
    FROM
        library_books
        JOIN borrowing_records ON library_books.book_id = borrowing_records.book_id
    GROUP BY
        library_books.book_id,
        total_copies
    HAVING
        current_borrowers = total_copies
)
SELECT
    library_books.book_id,
    title,
    author,
    genre,
    publication_year,
    current_borrowers
FROM
    library_books
    JOIN borrowed_books ON library_books.book_id = borrowed_books.book_id
ORDER BY
    current_borrowers DESC,
    title;