-- MySQL Script generated by MySQL Workbench
-- 05/30/24 13:01:21
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bytestore
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bytestore
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bytestore` DEFAULT CHARACTER SET utf8mb4 ;
USE `bytestore` ;

-- -----------------------------------------------------
-- Table `bytestore`.`cesta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bytestore`.`cesta` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `Codigo` DOUBLE NULL DEFAULT '1' COMMENT 'Id de producto',
  `Descripcion` VARCHAR(255) NULL DEFAULT NULL COMMENT 'Nombre y descripcción del producto comprado',
  `Precio` DOUBLE NULL DEFAULT NULL COMMENT 'Precio final de compra',
  `unidades` DOUBLE NULL DEFAULT NULL COMMENT 'Unidades compradas',
  `email` VARCHAR(255) NULL DEFAULT NULL COMMENT 'Dirección de correo electrónico',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `bytestore`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bytestore`.`clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `Cif` VARCHAR(50) NULL DEFAULT NULL COMMENT '',
  `Direccion_Envio` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Domicilio Envío',
  `Poblacion` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Población',
  `Provincia` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Provincia',
  `cp` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Codigo Postal',
  `email` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COMMENT = 'Tabla de Clientes';


-- -----------------------------------------------------
-- Table `bytestore`.`familias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bytestore`.`familias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `Imagen` VARCHAR(255) NULL DEFAULT NULL COMMENT 'Imagen',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COMMENT = 'Tabla de familias';


-- -----------------------------------------------------
-- Table `bytestore`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bytestore`.`productos` (
  `idId` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `Nombre` VARCHAR(25) NULL DEFAULT NULL COMMENT '',
  `Descripccion` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `Familia` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `Precio` DOUBLE NULL DEFAULT NULL COMMENT '',
  `Imagen1` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `Imagen2` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `Imagen3` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `familias_id` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`idId`)  COMMENT '',
  INDEX `fk_productos_familias_idx` (`familias_id` ASC)  COMMENT '',
  CONSTRAINT `fk_productos_familias`
    FOREIGN KEY (`familias_id`)
    REFERENCES `bytestore`.`familias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COMMENT = 'Tabla de Productos';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
