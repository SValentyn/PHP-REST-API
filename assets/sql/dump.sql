DROP DATABASE IF EXISTS `php_rest_api`;

CREATE DATABASE `php_rest_api`
    CHARACTER SET utf8
    COLLATE 'utf8_general_ci';

USE `php_rest_api`;

SET NAMES utf8;
SET CHARSET utf8;
SET CHARACTER SET utf8;

SET auto_increment_increment = 1;
SET character_set_client = utf8;
SET character_set_connection = utf8;
SET character_set_results = utf8;
SET character_set_server = utf8;

DROP TABLE IF EXISTS `roles`;

DROP TABLE IF EXISTS `users`;

-- -- --
CREATE TABLE `roles`
(
    `id`    INT(11) AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  CHARACTER SET utf8
  DEFAULT COLLATE 'utf8_general_ci';

INSERT INTO roles (`title`)
VALUES ('admin'),
       ('user');
-- -- --

-- -- --
CREATE TABLE `users`
(
    `id`         INT(11) AUTO_INCREMENT,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name`  VARCHAR(255) NOT NULL,
    `password`   VARCHAR(255) NOT NULL,
    `email`      VARCHAR(255) NOT NULL,
    `role_id`    INT(11)      NOT NULL,
    `image_path` VARCHAR(255),
    `image_name` BLOB,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  CHARACTER SET utf8
  DEFAULT COLLATE 'utf8_general_ci';

INSERT INTO users (`first_name`, `last_name`, `email`, `password`, `role_id`, `image_path`, `image_name`)
VALUES ('Cristoforo', 'Colombo', 'Cristoforo-Colombo@gmail.com', '111111', 1, 'public/images/', 'img-01.png'),
       ('Fernando', 'de Magallanes', 'Fernando-de-Magallanes@outlook.com', '000000', 2, 'public/images/', 'img-01.png'),
       ('James', 'Cook', 'James-Cook@gmail.com', '000000', 2, 'public/images/', 'img-01.png'),
       ('Vasco', 'da Gama', 'Vasco-da-Gama@gmail.com', '000000', 2, 'public/images/', 'img-01.png');
