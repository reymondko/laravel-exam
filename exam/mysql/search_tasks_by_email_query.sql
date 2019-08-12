#retrieve all tasks that belongs to a user email
SET @email = "reymondb@codev.com";    
SELECT 
    *
FROM
    BuildTools.Tasks T
        LEFT JOIN
    TaskAssign TA ON T.id = TA.task_id
        LEFT JOIN
    Users u ON u.id = TA.user_id
WHERE
    u.email = @email;