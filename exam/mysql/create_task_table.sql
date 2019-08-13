#create Task table
CREATE TABLE `BuildTools`.`Tasks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `subject` VARCHAR(200) NULL,
  `body` TEXT NULL,
  `created_at` TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`));