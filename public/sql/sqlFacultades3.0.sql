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
  `telefono` VARCHAR(45) NULL ,
  `direccion` TEXT NULL ,
  `email` TEXT NULL ,
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
  `facultad_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `facultades10_idx` (`facultad_id` ASC) ,
  CONSTRAINT `facultades10`
    FOREIGN KEY (`facultad_id` )
    REFERENCES `facultades`.`facultades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`escuelas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`escuelas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(200) NULL ,
  `telefono` VARCHAR(45) NULL ,
  `direccion` TEXT NULL ,
  `email` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `departamentoacademico_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `departamentoacademicos1_idx` (`departamentoacademico_id` ASC) ,
  CONSTRAINT `departamentoacademicos1`
    FOREIGN KEY (`departamentoacademico_id` )
    REFERENCES `facultades`.`departamentoacademicos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`mallas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`mallas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `imagen` VARCHAR(200) NULL ,
  `numcurricula` VARCHAR(5) NULL ,
  `fechaRegistro` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `escuela_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `escuela1_idx` (`escuela_id` ASC) ,
  CONSTRAINT `escuela1`
    FOREIGN KEY (`escuela_id` )
    REFERENCES `facultades`.`escuelas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`galeriafacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`galeriafacultades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `imagen` VARCHAR(300) NULL ,
  `descripcion` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `facultad_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `facultades9_idx` (`facultad_id` ASC) ,
  CONSTRAINT `facultades9`
    FOREIGN KEY (`facultad_id` )
    REFERENCES `facultades`.`facultades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`descripcionfacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`descripcionfacultades` (
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
  `facultad_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `facultades8_idx` (`facultad_id` ASC) ,
  CONSTRAINT `facultades8`
    FOREIGN KEY (`facultad_id` )
    REFERENCES `facultades`.`facultades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`organigramafacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`organigramafacultades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` TEXT NULL ,
  `imagen` VARCHAR(200) NULL ,
  `fecha` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `facultad_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `facultades4_idx` (`facultad_id` ASC) ,
  CONSTRAINT `facultades4`
    FOREIGN KEY (`facultad_id` )
    REFERENCES `facultades`.`facultades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  `facultad_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `facultades5_idx` (`facultad_id` ASC) ,
  CONSTRAINT `facultades5`
    FOREIGN KEY (`facultad_id` )
    REFERENCES `facultades`.`facultades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  `facultad_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `facultades7_idx` (`facultad_id` ASC) ,
  CONSTRAINT `facultades7`
    FOREIGN KEY (`facultad_id` )
    REFERENCES `facultades`.`facultades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`bannerfacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`bannerfacultades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(200) NULL ,
  `descripcion` TEXT NULL ,
  `imagen` VARCHAR(200) NULL ,
  `fechapublica` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `facultad_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `facultades1_idx` (`facultad_id` ASC) ,
  CONSTRAINT `facultades1`
    FOREIGN KEY (`facultad_id` )
    REFERENCES `facultades`.`facultades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`videofacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`videofacultades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(200) NULL ,
  `descripcion` TEXT NULL ,
  `link` TEXT NULL ,
  `fecha` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `facultad_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `facultades11_idx` (`facultad_id` ASC) ,
  CONSTRAINT `facultades11`
    FOREIGN KEY (`facultad_id` )
    REFERENCES `facultades`.`facultades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`descripcionescuelas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`descripcionescuelas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` TEXT NULL ,
  `tituloprofesional` VARCHAR(500) NULL ,
  `gradoacade` VARCHAR(100) NULL ,
  `duracion` VARCHAR(100) NULL ,
  `logo` VARCHAR(300) NULL ,
  `mision` TEXT NULL ,
  `vision` TEXT NULL ,
  `historia` TEXT NULL ,
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
  `departamentoacademico_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `gradoacademico1_idx` (`gradoacademico_id` ASC) ,
  INDEX `categoriadocen1_idx` (`categoriadocente_id` ASC) ,
  INDEX `persona1_idx` (`persona_id` ASC) ,
  INDEX `departamentoacademicos2_idx` (`departamentoacademico_id` ASC) ,
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
    ON UPDATE NO ACTION,
  CONSTRAINT `departamentoacademicos2`
    FOREIGN KEY (`departamentoacademico_id` )
    REFERENCES `facultades`.`departamentoacademicos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`perfiles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`perfiles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` TEXT NULL ,
  `perfil` TEXT NULL ,
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
-- Table `facultades`.`cargos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`cargos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cargo` VARCHAR(200) NULL ,
  `descripcion` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `facultad_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `facultades14_idx` (`facultad_id` ASC) ,
  CONSTRAINT `facultades14`
    FOREIGN KEY (`facultad_id` )
    REFERENCES `facultades`.`facultades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  `gradoacademico_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `cargos1_idx` (`cargo_id` ASC) ,
  INDEX `personas1_idx` (`persona_id` ASC) ,
  INDEX `gradoacademicos1_idx` (`gradoacademico_id` ASC) ,
  CONSTRAINT `cargos1`
    FOREIGN KEY (`cargo_id` )
    REFERENCES `facultades`.`cargos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `personas1`
    FOREIGN KEY (`persona_id` )
    REFERENCES `facultades`.`personas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `gradoacademicos1`
    FOREIGN KEY (`gradoacademico_id` )
    REFERENCES `facultades`.`gradoacademicos` (`id` )
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
-- Table `facultades`.`tipopublicaciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`tipopublicaciones` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(500) NULL ,
  `descripcion` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`publicaciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`publicaciones` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(500) NULL ,
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
  `tipopublicacion_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `escuelas2_idx` (`escuela_id` ASC) ,
  INDEX `temas2_idx` (`tema_id` ASC) ,
  INDEX `tipopublicaciones1_idx` (`tipopublicacion_id` ASC) ,
  CONSTRAINT `escuelas2`
    FOREIGN KEY (`escuela_id` )
    REFERENCES `facultades`.`escuelas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `temas2`
    FOREIGN KEY (`tema_id` )
    REFERENCES `facultades`.`temas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `tipopublicaciones1`
    FOREIGN KEY (`tipopublicacion_id` )
    REFERENCES `facultades`.`tipopublicaciones` (`id` )
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
  `facultad_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `personas2_idx` (`persona_id` ASC) ,
  INDEX `comiestudiantil1_idx` (`comiestudiantil_id` ASC) ,
  INDEX `facultades12_idx` (`facultad_id` ASC) ,
  CONSTRAINT `personas2`
    FOREIGN KEY (`persona_id` )
    REFERENCES `facultades`.`personas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `comiestudiantil1`
    FOREIGN KEY (`comiestudiantil_id` )
    REFERENCES `facultades`.`comiestudiantiles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `facultades12`
    FOREIGN KEY (`facultad_id` )
    REFERENCES `facultades`.`facultades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`documentofacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`documentofacultades` (
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
  `facultad_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `facultades2_idx` (`facultad_id` ASC) ,
  CONSTRAINT `facultades2`
    FOREIGN KEY (`facultad_id` )
    REFERENCES `facultades`.`facultades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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


-- -----------------------------------------------------
-- Table `facultades`.`estilos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`estilos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fondoheader` VARCHAR(45) NULL ,
  `textoheader` VARCHAR(45) NULL ,
  `fondofooter` VARCHAR(45) NULL ,
  `textofooter` VARCHAR(45) NULL ,
  `fondonavbar` VARCHAR(45) NULL ,
  `textonavbar` VARCHAR(45) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `facultad_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `facultades6_idx` (`facultad_id` ASC) ,
  CONSTRAINT `facultades6`
    FOREIGN KEY (`facultad_id` )
    REFERENCES `facultades`.`facultades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`redesfacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`redesfacultades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `facebook` TEXT NULL ,
  `google` TEXT NULL ,
  `youtube` TEXT NULL ,
  `twitter` TEXT NULL ,
  `instagram` TEXT NULL ,
  `linkedln` TEXT NULL ,
  `pinterest` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `facultad_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `facultades3_idx` (`facultad_id` ASC) ,
  CONSTRAINT `facultades3`
    FOREIGN KEY (`facultad_id` )
    REFERENCES `facultades`.`facultades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`redesescuelas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`redesescuelas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `facebook` TEXT NULL ,
  `google` TEXT NULL ,
  `youtube` TEXT NULL ,
  `twitter` TEXT NULL ,
  `instagram` TEXT NULL ,
  `linkedln` TEXT NULL ,
  `pinterest` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `escuela_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `escuelas4_idx` (`escuela_id` ASC) ,
  CONSTRAINT `escuelas4`
    FOREIGN KEY (`escuela_id` )
    REFERENCES `facultades`.`escuelas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`funciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`funciones` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `funcionescol` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `facultades`.`unidadesfacultades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facultades`.`unidadesfacultades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(500) NULL ,
  `abreviatura` VARCHAR(45) NULL ,
  `descripcion` TEXT NULL ,
  `imagen` VARCHAR(100) NULL ,
  `facultad_id` INT NOT NULL ,
  `funcion_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `facultades13_idx` (`facultad_id` ASC) ,
  INDEX `funciones1_idx` (`funcion_id` ASC) ,
  CONSTRAINT `facultades13`
    FOREIGN KEY (`facultad_id` )
    REFERENCES `facultades`.`facultades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `funciones1`
    FOREIGN KEY (`funcion_id` )
    REFERENCES `facultades`.`funciones` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `facultades` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
