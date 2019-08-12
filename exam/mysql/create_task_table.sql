#create Task table
CREATE TABLE `BuildTools`.`Tasks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `subject` VARCHAR(200) NULL,
  `body` TEXT NULL,
  `date_task_created` TIMESTAMP,
  `date_task_updated` TIMESTAMP NULL,
  PRIMARY KEY (`id`));