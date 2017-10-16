-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema catalunapizz
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema catalunapizz
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `catalunapizz` DEFAULT CHARACTER SET latin1 ;
USE `catalunapizz` ;

-- -----------------------------------------------------
-- Table `catalunapizz`.`about_us`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalunapizz`.`about_us` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `about-us` TEXT NOT NULL,
  `news` TEXT NULL,
  `mail` VARCHAR(100) NULL,
  `tel` VARCHAR(20) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `catalunapizz`.`drink`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalunapizz`.`drink` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  `price_1` DECIMAL(6,2) NULL,
  `price_2` VARCHAR(45) NULL,
  `picture` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `catalunapizz`.`planning`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalunapizz`.`planning` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `day` VARCHAR(20) NULL,
  `location_am` TEXT NULL,
  `hour_am` VARCHAR(20) NULL,
  `gps_am` VARCHAR(20) NULL,
  `location_pm` TEXT NULL,
  `hour_pm` VARCHAR(20) NULL,
  `gps_pm` VARCHAR(20) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `catalunapizz`.`slider`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalunapizz`.`slider` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `picture` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `catalunapizz`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalunapizz`.`category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `picture` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalunapizz`.`pizza`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalunapizz`.`pizza` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  `ingredients` TEXT NULL,
  `price_1` DECIMAL(6,2) NULL,
  `price_2` DECIMAL(6,2) NULL,
  `category_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pizza_category1_idx` (`category_id` ASC),
  CONSTRAINT `fk_pizza_category1`
    FOREIGN KEY (`category_id`)
    REFERENCES `catalunapizz`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `catalunapizz`.`evenement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalunapizz`.`evenement` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `location` TEXT NULL,
  `date` DATE NULL,
  `description` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
