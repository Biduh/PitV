-- MySQL Script generated by MySQL Workbench
-- Sun Dec  3 20:26:49 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema cafeteria_gourmet
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cafeteria_gourmet
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cafeteria_gourmet` DEFAULT CHARACTER SET utf8 ;
USE `cafeteria_gourmet` ;



-- -----------------------------------------------------
-- Table `cafeteria_gourmet`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cafeteria_gourmet`.`cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `tel_1` VARCHAR(11) NOT NULL,
  `tel_2` VARCHAR(11) NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cafeteria_gourmet`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cafeteria_gourmet`.`endereco` (
  `id_endereco` INT NOT NULL AUTO_INCREMENT,
  `cep` VARCHAR(8) NOT NULL,
  `rua` VARCHAR(100) NOT NULL,
  `numero` INT NULL,
  `bairro` VARCHAR(100) NOT NULL,
  `cidade` VARCHAR(100) NOT NULL,
  `uf` VARCHAR(2) NOT NULL,
  `id_cliente` INT NOT NULL,
  PRIMARY KEY (`id_endereco`, `id_cliente`),
  INDEX `fk_endereco_cliente1_idx` (`id_cliente` ASC),
  CONSTRAINT `fk_endereco_cliente1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `cafeteria_gourmet`.`cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cafeteria_gourmet`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cafeteria_gourmet`.`produto` (
  `id_produto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(80) NOT NULL,
  `preco` FLOAT NOT NULL,
  `descricao` VARCHAR(100) NOT NULL,
  `img` VARCHAR(80) NULL,
  PRIMARY KEY (`id_produto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cafeteria_gourmet`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cafeteria_gourmet`.`pedido` (
  `id_pedido` INT NOT NULL AUTO_INCREMENT,
  `id_cliente` INT NOT NULL,
  `valor` FLOAT NOT NULL,
  `pagamento` VARCHAR(45) NOT NULL,
  `data_pedido` DATETIME NOT NULL,
  `descricao` VARCHAR(100) NULL,
  PRIMARY KEY (`id_pedido`, `id_cliente`),
  INDEX `fk_pedido_cliente1_idx` (`id_cliente` ASC),
  CONSTRAINT `fk_pedido_cliente1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `cafeteria_gourmet`.`cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cafeteria_gourmet`.`pedido_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cafeteria_gourmet`.`pedido_produto` (
  `id_pedido` INT NOT NULL,
  `id_cliente` INT NOT NULL,
  `id_produto` INT NOT NULL,
  `quantidade` INT NOT NULL,
  PRIMARY KEY (`id_pedido`, `id_cliente`, `id_produto`),
  INDEX `fk_pedido_has_produto_produto1_idx` (`id_produto` ASC),
  INDEX `fk_pedido_has_produto_pedido1_idx` (`id_pedido` ASC, `id_cliente` ASC),
  CONSTRAINT `fk_pedido_has_produto_pedido1`
    FOREIGN KEY (`id_pedido` , `id_cliente`)
    REFERENCES `cafeteria_gourmet`.`pedido` (`id_pedido` , `id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_has_produto_produto1`
    FOREIGN KEY (`id_produto`)
    REFERENCES `cafeteria_gourmet`.`produto` (`id_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cafeteria_gourmet`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cafeteria_gourmet`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(80) NOT NULL,
  `senha` VARCHAR(120) NOT NULL,
  `cod_conf` INT(6) NULL,
  `status` CHAR(1) NULL DEFAULT '1',
  `id_cliente` INT NOT NULL,
  PRIMARY KEY (`id_usuario`, `id_cliente`),
  INDEX `fk_usuario_cliente1_idx` (`id_cliente` ASC),
  CONSTRAINT `fk_usuario_cliente1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `cafeteria_gourmet`.`cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
CREATE USER IF NOT EXISTS 'cafeteria_gourmet'@'localhost';
GRANT ALL PRIVILEGES ON cafeteria_gourmet.* TO 'cafeteria_gourmet'@'localhost' IDENTIFIED BY 'qwe123';
INSERT INTO produto (nome, preco, descricao, img) VALUES ('CAFÉ SUPER UM', 8.30, 'CAPSULA 10 UNIDADES', 'cf_01.webp');
INSERT INTO produto (nome, preco, descricao, img) VALUES ('CAFÉ SUPER DOIS', 12.20, 'CAPSULA 15 UNIDADES', 'cf_02.webp');
INSERT INTO produto (nome, preco, descricao, img) VALUES ('CAFÉ SUPER TRES', 20.50, 'CAPSULA 20 UNIDADES', 'cf_03.webp');
INSERT INTO produto (nome, preco, descricao, img) VALUES ('CAFÉ SUPER QUATRO', 10.50, 'CAPSULA 15 UNIDADES', 'cf_04.webp');
INSERT INTO produto (nome, preco, descricao, img) VALUES ('CAFÉ SUPER CINCO', 15.20, 'CAPSULA 15 UNIDADES', 'cf_05.webp');
INSERT INTO produto (nome, preco, descricao, img) VALUES ('CAFÉ SUPER SEIS', 14.60, 'CAPSULA 15 UNIDADES', 'cf_06.webp');
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
