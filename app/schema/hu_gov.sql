-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema hu_gov
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema hu_gov
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `hu_gov` DEFAULT CHARACTER SET utf8 ;
USE `hu_gov` ;

-- -----------------------------------------------------
-- Table `hu_gov`.`gibdd`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hu_gov`.`gibdd` (
  `number` VARCHAR(9) NOT NULL DEFAULT '',
  `passport` INT(11) NOT NULL DEFAULT '0')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `hu_gov`.`mfc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hu_gov`.`mfc` (
  `passport` INT(11) NOT NULL,
  `name` VARCHAR(1024) NOT NULL DEFAULT '',
  `second_name` VARCHAR(1024) NOT NULL DEFAULT '',
  `birth_date` VARCHAR(20) NOT NULL DEFAULT '',
  `sex` SMALLINT(6) NOT NULL DEFAULT '0',
  `social_card` INT(11) NOT NULL DEFAULT '0',
  `email` VARCHAR(1024) NOT NULL DEFAULT '',
  `phone` VARCHAR(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`passport`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `hu_gov`.`okved`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hu_gov`.`okved` (
  `id` INT(11) NOT NULL,
  `name` VARCHAR(1024) NOT NULL DEFAULT '',
  `always` SMALLINT(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `hu_gov`.`pass`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hu_gov`.`pass` (
  `pass_id` VARCHAR(24) NOT NULL DEFAULT '',
  `passport` INT(11) NOT NULL DEFAULT '0',
  `expire_date` INT(11) NOT NULL DEFAULT '0',
  `create_date` INT(11) NOT NULL DEFAULT '0',
  `name` VARCHAR(1024) NOT NULL DEFAULT '',
  `second_name` VARCHAR(1024) NOT NULL DEFAULT '',
  `email` VARCHAR(1024) NOT NULL DEFAULT '',
  `phone` VARCHAR(10) NOT NULL DEFAULT '',
  `tax_id` INT(11) NOT NULL DEFAULT '0',
  `inn` INT(11) NOT NULL DEFAULT '0',
  `organization_name` VARCHAR(1024) NOT NULL DEFAULT '',
  `car_number` VARCHAR(9) NOT NULL DEFAULT '',
  `social_card` INT(11) NOT NULL DEFAULT '0',
  `troika` INT(11) NOT NULL DEFAULT '0')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `hu_gov`.`people_tax`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hu_gov`.`people_tax` (
  `passport` INT(11) NOT NULL DEFAULT '0',
  `tax_id` INT(11) NOT NULL DEFAULT '0',
  `mfc_passport` INT(11) NOT NULL,
  PRIMARY KEY (`mfc_passport`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `hu_gov`.`social_transport`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hu_gov`.`social_transport` (
  `troika` INT(11) NOT NULL DEFAULT '0',
  `social_card` INT(11) NOT NULL DEFAULT '0',
  `passport` INT(11) NOT NULL DEFAULT '0',
  `lock` SMALLINT(6) NOT NULL DEFAULT '0',
  `unlock_expire` INT(11) NOT NULL DEFAULT '0')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `hu_gov`.`tax`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hu_gov`.`tax` (
  `id` INT(11) NOT NULL,
  `organization_name` VARCHAR(1024) NOT NULL DEFAULT '',
  `inn` INT(11) NOT NULL DEFAULT '0',
  `okved_id` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
