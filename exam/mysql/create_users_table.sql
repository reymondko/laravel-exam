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