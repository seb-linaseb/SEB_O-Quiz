-- MySQL Script generated by MySQL Workbench
-- Thu 07 Mar 2019 10:46:25 AM CET
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema oquiz
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `levels`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `levels` ;

CREATE TABLE IF NOT EXISTS `levels` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(32) BINARY NOT NULL,
  `status` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `answers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `answers` ;

CREATE TABLE IF NOT EXISTS `answers` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(255) NOT NULL,
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  `questions_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_answers_questions1_idx` (`questions_id` ASC));


-- -----------------------------------------------------
-- Table `app_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `app_users` ;

CREATE TABLE IF NOT EXISTS `app_users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(60) NOT NULL,
  `firstname` VARCHAR(64) NULL,
  `lastname` VARCHAR(64) NULL,
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC));


-- -----------------------------------------------------
-- Table `quizzes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `quizzes` ;

CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(64) NOT NULL,
  `description` VARCHAR(255) NULL,
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  `app_users_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_quizzes_app_users1_idx` (`app_users_id` ASC));


-- -----------------------------------------------------
-- Table `questions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `questions` ;

CREATE TABLE IF NOT EXISTS `questions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` VARCHAR(255) NOT NULL,
  `anecdote` TEXT NULL,
  `wiki` VARCHAR(64) NULL,
  `status` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  `levels_id` INT UNSIGNED NOT NULL,
  `answers_id` INT UNSIGNED NOT NULL,
  `quizzes_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_questions_levels_idx` (`levels_id` ASC),
  INDEX `fk_questions_answers1_idx` (`answers_id` ASC),
  INDEX `fk_questions_quizzes1_idx` (`quizzes_id` ASC));


-- -----------------------------------------------------
-- Table `tags`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tags` ;

CREATE TABLE IF NOT EXISTS `tags` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NOT NULL,
  `status` TINYINT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `quizzes_has_tags`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `quizzes_has_tags` ;

CREATE TABLE IF NOT EXISTS `quizzes_has_tags` (
  `quizzes_id` INT UNSIGNED NOT NULL,
  `tags_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`quizzes_id`, `tags_id`),
  INDEX `fk_quizzes_has_tags_tags1_idx` (`tags_id` ASC),
  INDEX `fk_quizzes_has_tags_quizzes1_idx` (`quizzes_id` ASC));


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
