WITH RECURSIVE words AS (
    SELECT
        content_id,
        content_text,
        1 AS pos,
        REGEXP_SUBSTR(content_text, '[^ ]+', 1, 1) AS word
    FROM
        user_content
    UNION
    ALL
    SELECT
        content_id,
        content_text,
        pos + 1,
        REGEXP_SUBSTR(content_text, '[^ ]+', 1, pos + 1)
    FROM
        words
    WHERE
        word IS NOT NULL
),
processed AS (
    SELECT
        content_id,
        pos,
        CASE
            -- valid hyphen word ONLY
            WHEN word REGEXP '^[A-Za-z]+(-[A-Za-z]+)+$' THEN (
                SELECT
                    GROUP_CONCAT(
                        CONCAT(
                            UPPER(LEFT(part, 1)),
                            LOWER(SUBSTRING(part, 2))
                        )
                        ORDER BY
                            n SEPARATOR '-'
                    )
                FROM
                    (
                        SELECT
                            n,
                            SUBSTRING_INDEX(SUBSTRING_INDEX(word, '-', n), '-', -1) AS part
                        FROM
                            (
                                SELECT
                                    1 n
                                UNION
                                ALL
                                SELECT
                                    2
                                UNION
                                ALL
                                SELECT
                                    3
                                UNION
                                ALL
                                SELECT
                                    4
                                UNION
                                ALL
                                SELECT
                                    5
                            ) nums
                        WHERE
                            n <= 1 + LENGTH(word) - LENGTH(REPLACE(word, '-', ''))
                    ) t
            ) -- normal word (including invalid hyphen cases)
            WHEN word REGEXP '[A-Za-z]' THEN CONCAT(
                UPPER(LEFT(word, 1)),
                LOWER(SUBSTRING(word, 2))
            )
            ELSE word
        END AS new_word
    FROM
        words
),
final AS (
    SELECT
        content_id,
        GROUP_CONCAT(
            new_word
            ORDER BY
                pos SEPARATOR ' '
        ) AS converted_text
    FROM
        processed
    GROUP BY
        content_id
)
SELECT
    u.content_id,
    u.content_text AS original_text,
    f.converted_text
FROM
    user_content u
    JOIN final f USING (content_id);