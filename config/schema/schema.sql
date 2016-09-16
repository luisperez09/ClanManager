-----------------------------------
-- Table `clash_db`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clash_db`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(25) NOT NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `created` DATE NULL,
  `modified` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clash_db`.`sanciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clash_db`.`sanciones` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` TEXT NULL,
  `duration` INT NULL,
  `created` DATE NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`)
ENGINE = InnoDB;
