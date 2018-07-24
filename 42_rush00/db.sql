CREATE DATABASE IF NOT EXISTS `rush00` DEFAULT CHARACTER SET utf8;
USE `rush00`;

CREATE TABLE IF NOT EXISTS `rush00`.`article` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `quantity` INT UNSIGNED NOT NULL,
  `image` VARCHAR(255),  
  PRIMARY KEY (`id`)
);
  
CREATE TABLE IF NOT EXISTS `rush00`.`category` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`)
  );


CREATE TABLE IF NOT EXISTS `rush00`.`user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE IF NOT EXISTS `rush00`.`panier` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`)
  REFERENCES `rush00`.`user` (`id`)
);


CREATE TABLE IF NOT EXISTS `rush00`.`articles_has_category` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `article_id` INT UNSIGNED,
  `category_id` INT UNSIGNED,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`article_id`)
  REFERENCES `rush00`.`article` (`id`),
  FOREIGN KEY (`category_id`)
  REFERENCES `rush00`.`category` (`id`)
  );

CREATE TABLE IF NOT EXISTS `rush00`.`panier_has_articles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `panier_id` INT UNSIGNED,
  `article_id` INT UNSIGNED,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`panier_id`)
  REFERENCES `rush00`.`panier` (`id`),
  FOREIGN KEY (`article_id`)
  REFERENCES `rush00`.`article` (`id`)
);
