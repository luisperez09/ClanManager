-----------------------------------
-- Table `clash_db`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clash_db`.`users` (
  `id` INT NOT NULL,
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
  `id` INT NOT NULL,
  `description` TEXT NULL,
  `duration` INT NULL,
  `created` DATE NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_sanciones_users_idx` (`users_id` ASC),
  CONSTRAINT `fk_sanciones_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `clash_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
