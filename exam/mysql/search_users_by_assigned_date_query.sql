#return all users with task assigned created after specific date
SET @inputdate = "2019-08-13"; 
SELECT 
    *
FROM
    Users u
        LEFT JOIN
    TaskAssign TA ON u.id = TA.user_id
        LEFT JOIN
    BuildTools.Tasks T ON T.id = TA.task_id
WHERE
    date_task_created >= @inputdate;