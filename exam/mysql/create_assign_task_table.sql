#create Assign Task table
CREATE TABLE `BuildTools`.`TaskAssign` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) NULL,
  `task_id` INT(10) NULL,
  `assigned_date` TIMESTAMP NULL,  
  `date_updated` TIMESTAMP NULL,
  PRIMARY KEY (`id`));