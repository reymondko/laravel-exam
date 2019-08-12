#create databse
CREATE DATABASE BuildTools;
USE BuildTools;

#create user with all privileges 
GRANT ALL PRIVILEGES ON BuildTools.* TO 'BuildToolsAdmin'@'localhost' IDENTIFIED BY 'p@s$w0rd';

#create  user with view/read only privilege
GRANT SELECT ON BuildTools.* TO 'BuildToolsUser'@'%' identified by 'tester';

CREATE TABLE tablename ( id smallint unsigned not null auto_increment, name varchar(20) not null, constraint pk_example primary key (id) );
INSERT INTO tablename ( id, name ) VALUES ( null, 'Sample data' );

#create Users table
CREATE TABLE `BuildTools`.`Users` (
  `id` INT NULL AUTO_INCREMENT,
  `fullname` VARCHAR(250) NULL,
  `email` VARCHAR(100) NULL,
  `password` VARCHAR(100) NULL,
  `datecreated` TIMESTAMP NULL,
  `dateupdated` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE);
  PRIMARY KEY (`id`));


#create Task table
CREATE TABLE `BuildTools`.`Tasks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `subject` VARCHAR(200) NULL,
  `body` TEXT NULL,
  `date_task_created` TIMESTAMP,
  `date_task_updated` TIMESTAMP NULL,
  PRIMARY KEY (`id`));

#create Assign Task table
CREATE TABLE `BuildTools`.`TaskAssign` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) NULL,
  `task_id` INT(10) NULL,
  `assigned_date` TIMESTAMP NULL,
  `date_updated` TIMESTAMP NULL,
  PRIMARY KEY (`id`));


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