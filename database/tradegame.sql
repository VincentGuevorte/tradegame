START TRANSACTION;

DROP DATABASE IF EXISTS bdd_tradegame;
CREATE DATABASE bdd_tradegame;
USE bdd_tradegame;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `telephone` NUMERIC NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `isActive` TINYINT(1) DEFAULT NULL,
    `date_create` DATETIME DEFAULT CURRENT_DATE,
    `date_update` DATETIME DEFAULT CURRENT_DATE,
    `date_delete` DATETIME DEFAULT CURRENT_DATE,
    PRIMARY KEY (`id`)
)ENGINE=MariaDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `jeux`;
CREATE TABLE `jeux` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `etat` VARCHAR(255) NOT NULL,
    `platedorme` VARCHAR(255) NOT NULL,
    `prix` FLOAT NOT NULL,
    `isActive` TINYINT(1) DEFAULT NULL,
    `date_create` DATETIME DEFAULT CURRENT_DATE,
    `date_update` DATETIME DEFAULT CURRENT_DATE,
    `date_delete` DATETIME DEFAULT CURRENT_DATE,
    `id_users` INT(10),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_users`) REFERENCES users (`id`)
)ENGINE=MariaDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `proposition`;
CREATE TABLE `proposition` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `commentaire` VARCHAR(255) NOT NULL,
    `isActive` TINYINT(1) DEFAULT NULL,
    `date_create` DATETIME DEFAULT CURRENT_DATE,
    `date_update` DATETIME DEFAULT CURRENT_DATE,
    `date_delete` DATETIME DEFAULT CURRENT_DATE,
    `id_users` INT(10),
    `id_jeux` INT(10),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_users`) REFERENCES users (`id`),
    FOREIGN KEY (`id_jeux`) REFERENCES jeux (`id`)
)ENGINE=MariaDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `mail_adress` VARCHAR(255) NOT NULL,
    `subject` VARCHAR(255) NOT NULL,
    `message` TEXT NOT NULL,
    `isActive` TINYINT(1) DEFAULT NULL,
    `date_create` DATETIME DEFAULT CURRENT_DATE,
    `date_update` DATETIME DEFAULT CURRENT_DATE,
    `date_delete` DATETIME DEFAULT CURRENT_DATE,
    `id_users` INT(10),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_users`) REFERENCES users (`id`)
)ENGINE=MariaDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
    `id` INT(10) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `isActive` TINYINT(1) DEFAULT NULL,
    `date_create` DATETIME DEFAULT CURRENT_DATE,
    `date_update` DATETIME DEFAULT CURRENT_DATE,
    `date_delete` DATETIME DEFAULT CURRENT_DATE,
    `id_users` INT(10),
    `id_jeux` INT(10),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_users`) REFERENCES users (`id`),
    FOREIGN KEY (`id_jeux`) REFERENCES jeux (`id`)
)ENGINE=MariaDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

COMMIT;