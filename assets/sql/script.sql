USE db_project3;

DROP TABLE IF EXISTS roles;

DROP TABLE IF EXISTS users;

-- -- --
CREATE TABLE roles
(
    id    int(11) AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

INSERT INTO roles (title)
VALUES ('admin'),
       ('user');
-- -- --

-- -- --
CREATE TABLE users
(
    id         int(11) AUTO_INCREMENT,
    first_name varchar(255) NOT NULL,
    last_name  varchar(255) NOT NULL,
    password   varchar(255) NOT NULL,
    email      varchar(255) NOT NULL,
    role_id    int(11)      NOT NULL,
    image_path varchar(255),
    image_name blob,
    PRIMARY KEY (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

INSERT INTO users (first_name, last_name, email, password, role_id, image_path, image_name)
VALUES ('admin', 'admin', 'admin@gmail.com', 'admin', 1, 'public/images/', 'img-01.png'),
       ('admin1', 'admin1', 'admin1@gmail.com', 'admin', 1, 'public/images/', 'img-01.png'),
       ('user', 'user', 'user@gmail.com', 'user', 2, 'public/images/', 'img-01.png'),
       ('user1', 'user1', 'user1@gmail.com', 'user', 2, 'public/images/', 'img-01.png');
-- -- --

