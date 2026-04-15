# Write your MySQL query statement below
WITH total_reaction AS (
    SELECT
        user_id,
        COUNT(*) AS total
    FROM
        reactions
    GROUP BY
        user_id
    HAVING
        COUNT(*) >= 5
)
SELECT
    reactions.user_id,
    reactions.reaction AS dominant_reaction,
    ROUND(COUNT(*) / total_reaction.total, 2) AS reaction_ratio
FROM
    reactions
    JOIN total_reaction ON reactions.user_id = total_reaction.user_id
GROUP BY
    user_id,
    reaction
HAVING
    reaction_ratio >= 0.6
ORDER BY
    reaction_ratio DESC,
    user_id;