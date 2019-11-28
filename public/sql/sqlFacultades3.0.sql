SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

DROP SCHEMA IF EXISTS `facultades` ;
CREATE SCHEMA IF NOT EXISTS `facultades` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `facultades` ;

-- -----------------------------------------------------
-- Table `facultades`.`personas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`personas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `dni` CHAR(8) NULL ,
  `nombres` VARCHAR(100) NULL ,
  `apellidos` VARCHAR(100) NULL ,
  `foto` VARCHAR(200) NULL ,
  `genero` CHAR(1) NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`facultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`facultades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(200) NULL ,
  `abreviatura` VARCHAR(45) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`escuelas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`escuelas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(200) NULL ,
  `descripcion` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`departamentoacademicos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`departamentoacademicos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(200) NULL ,
  `descripcion` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`mallas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`mallas` (
  `idmalla` INT NOT NULL AUTO_INCREMENT ,
  `imagen` VARCHAR(200) NULL ,
  `numcurricula` VARCHAR(5) NULL ,
  `fechaRegistro` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `escuela_id` INT NOT NULL ,
  PRIMARY KEY (`idmalla`) ,
  INDEX `escuela1_idx` (`escuela_id` ASC) ,
  CONSTRAINT `escuela1`
    FOREIGN KEY (`escuela_id` )
    REFERENCES `facultades`.`escuelas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`galeriaFacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`galeriaFacultades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `imagen` VARCHAR(300) NULL ,
  `descripcion` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`descripcionFacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`descripcionFacultades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` TEXT NULL ,
  `reseñahistor` TEXT NULL ,
  `mision` TEXT NULL ,
  `vision` TEXT NULL ,
  `imagen` VARCHAR(300) NULL ,
  `filosofia` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`organigramaFacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`organigramaFacultades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `imagen` VARCHAR(200) NULL ,
  `fecha` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`noticiaFacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`noticiaFacultades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(200) NULL ,
  `descripcion` TEXT NULL ,
  `imagen` VARCHAR(200) NULL ,
  `fechapubli` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`eventoFacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`eventoFacultades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(200) NULL ,
  `descripcion` TEXT NULL ,
  `imagen` VARCHAR(200) NULL ,
  `fechainicio` DATE NULL ,
  `fechafin` DATE NULL ,
  `fechapublicac` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`bannerFacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`bannerFacultades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(200) NULL ,
  `descripcion` TEXT NULL ,
  `imagen` VARCHAR(200) NULL ,
  `fechapublica` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`videoFacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`videoFacultades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(200) NULL ,
  `descripcion` TEXT NULL ,
  `link` TEXT NULL ,
  `fecha` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`descripcionescuelas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`descripcionescuelas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` TEXT NULL ,
  `titulo` VARCHAR(200) NULL ,
  `gradoacade` VARCHAR(100) NULL ,
  `duracion` VARCHAR(100) NULL ,
  `logo` VARCHAR(300) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `escuela_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `escuela2_idx` (`escuela_id` ASC) ,
  CONSTRAINT `escuela2`
    FOREIGN KEY (`escuela_id` )
    REFERENCES `facultades`.`escuelas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`campolaborales`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`campolaborales` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` TEXT NULL ,
  `campolab` TEXT NULL ,
  `imagen` TEXT NULL ,
  `fecha` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `escuela_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `escuela3_idx` (`escuela_id` ASC) ,
  CONSTRAINT `escuela3`
    FOREIGN KEY (`escuela_id` )
    REFERENCES `facultades`.`escuelas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`nosotrosescuelas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`nosotrosescuelas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` TEXT NULL ,
  `mision` TEXT NULL ,
  `vision` TEXT NULL ,
  `historia` TEXT NULL ,
  `filosofia` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `escuela_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `escuela4_idx` (`escuela_id` ASC) ,
  CONSTRAINT `escuela4`
    FOREIGN KEY (`escuela_id` )
    REFERENCES `facultades`.`escuelas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`bannersescuelas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`bannersescuelas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(250) NULL ,
  `descripcion` TEXT NULL ,
  `imagen` VARCHAR(250) NULL ,
  `fechapublica` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `escuela_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `escuela5_idx` (`escuela_id` ASC) ,
  CONSTRAINT `escuela5`
    FOREIGN KEY (`escuela_id` )
    REFERENCES `facultades`.`escuelas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`categoriadocentes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`categoriadocentes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `categoria` VARCHAR(100) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`gradoacademicos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`gradoacademicos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `grado` VARCHAR(100) NULL ,
  `abreviatura` CHAR(5) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`docentes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`docentes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `curricula` VARCHAR(45) NULL ,
  `tituloprofe` VARCHAR(300) NULL ,
  `fechaingreso` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `gradoacademico_id` INT NOT NULL ,
  `categoriadocente_id` INT NOT NULL ,
  `persona_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `gradoacademico1_idx` (`gradoacademico_id` ASC) ,
  INDEX `categoriadocen1_idx` (`categoriadocente_id` ASC) ,
  INDEX `persona1_idx` (`persona_id` ASC) ,
  CONSTRAINT `gradoacademico1`
    FOREIGN KEY (`gradoacademico_id` )
    REFERENCES `facultades`.`gradoacademicos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `categoriadocen1`
    FOREIGN KEY (`categoriadocente_id` )
    REFERENCES `facultades`.`categoriadocentes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `persona1`
    FOREIGN KEY (`persona_id` )
    REFERENCES `facultades`.`personas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`perfiles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`perfiles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` TEXT NULL ,
  `perfil` VARCHAR(500) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `escuela_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `escuela7_idx` (`escuela_id` ASC) ,
  CONSTRAINT `escuela7`
    FOREIGN KEY (`escuela_id` )
    REFERENCES `facultades`.`escuelas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`tipousers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`tipousers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(100) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`users` (
  `id` INT NOT NULL ,
  `name` VARCHAR(191) NULL ,
  `email` VARCHAR(191) NULL ,
  `email_verified_at` TIMESTAMP NULL ,
  `password` VARCHAR(191) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `imagen` TEXT NULL ,
  `remember_token` VARCHAR(100) NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `tipouser_id` INT NOT NULL ,
  `persona_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `tipousuario1_idx` (`tipouser_id` ASC) ,
  INDEX `persona2_idx` (`persona_id` ASC) ,
  CONSTRAINT `tipousuario1`
    FOREIGN KEY (`tipouser_id` )
    REFERENCES `facultades`.`tipousers` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `persona2`
    FOREIGN KEY (`persona_id` )
    REFERENCES `facultades`.`personas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`cargos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`cargos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cargo` VARCHAR(200) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`autoridades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`autoridades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` TEXT NULL ,
  `fechainicio` DATE NULL ,
  `fechafin` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `cargo_id` INT NOT NULL ,
  `persona_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `cargos1_idx` (`cargo_id` ASC) ,
  INDEX `personas1_idx` (`persona_id` ASC) ,
  CONSTRAINT `cargos1`
    FOREIGN KEY (`cargo_id` )
    REFERENCES `facultades`.`cargos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `personas1`
    FOREIGN KEY (`persona_id` )
    REFERENCES `facultades`.`personas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`galeriaescuelas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`galeriaescuelas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `imagen` VARCHAR(300) NULL ,
  `descripcion` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `escuela_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `escuelas1_idx` (`escuela_id` ASC) ,
  CONSTRAINT `escuelas1`
    FOREIGN KEY (`escuela_id` )
    REFERENCES `facultades`.`escuelas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`temas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`temas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tema` VARCHAR(500) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`libros`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`libros` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(300) NULL ,
  `descripcion` TEXT NULL ,
  `fechapublicacion` DATE NULL ,
  `imagen` VARCHAR(300) NULL ,
  `ruta` VARCHAR(450) NULL ,
  `autor` VARCHAR(400) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `escuela_id` INT NOT NULL ,
  `tema_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `escuelas2_idx` (`escuela_id` ASC) ,
  INDEX `temas2_idx` (`tema_id` ASC) ,
  CONSTRAINT `escuelas2`
    FOREIGN KEY (`escuela_id` )
    REFERENCES `facultades`.`escuelas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `temas2`
    FOREIGN KEY (`tema_id` )
    REFERENCES `facultades`.`temas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`comiestudiantiles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`comiestudiantiles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(400) NULL ,
  `descripcion` TEXT NULL ,
  `imagen` VARCHAR(400) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`alumnos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`alumnos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `persona_id` INT NOT NULL ,
  `comiestudiantil_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `personas2_idx` (`persona_id` ASC) ,
  INDEX `comiestudiantil1_idx` (`comiestudiantil_id` ASC) ,
  CONSTRAINT `personas2`
    FOREIGN KEY (`persona_id` )
    REFERENCES `facultades`.`personas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `comiestudiantil1`
    FOREIGN KEY (`comiestudiantil_id` )
    REFERENCES `facultades`.`comiestudiantiles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`investigacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`investigacion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(500) NULL ,
  `descripcion` TEXT NULL ,
  `fechapublicacion` DATE NULL ,
  `imagen` VARCHAR(450) NULL ,
  `ruta` VARCHAR(450) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `docente_id` INT NOT NULL ,
  `tema_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `docentes1_idx` (`docente_id` ASC) ,
  INDEX `temas1_idx` (`tema_id` ASC) ,
  CONSTRAINT `docentes1`
    FOREIGN KEY (`docente_id` )
    REFERENCES `facultades`.`docentes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `temas1`
    FOREIGN KEY (`tema_id` )
    REFERENCES `facultades`.`temas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`documentoFacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`documentoFacultades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(400) NULL ,
  `descripcion` TEXT NULL ,
  `imagen` VARCHAR(400) NULL ,
  `ruta` VARCHAR(400) NULL ,
  `fecha` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`videoescuelas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`videoescuelas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(200) NULL ,
  `descripcion` TEXT NULL ,
  `link` TEXT NULL ,
  `fecha` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `escuela_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `escuelas3_idx` (`escuela_id` ASC) ,
  CONSTRAINT `escuelas3`
    FOREIGN KEY (`escuela_id` )
    REFERENCES `facultades`.`escuelas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `facultades` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
