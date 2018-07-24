<?php
$link = mysqli_connect("localhost", "root", "rootroot", "rush00");

if (mysqli_connect_errno())
{
	echo "Erreur: " . mysqli_connect_error();
	return false;
}

if(($result = mysqli_query($link, "CREATE TABLE IF NOT EXISTS `rush00`.`user` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(45) NOT NULL UNIQUE,
	`password` VARCHAR(255) NOT NULL,
	`is_admin` BOOLEAN NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`)
	)")) === true)
	echo "USER CREATED<br>";	

if(($result = mysqli_query($link, "CREATE TABLE IF NOT EXISTS `rush00`.`category` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(45) NOT NULL,
	PRIMARY KEY (`id`)
	);")) === true)
	echo "CATEGORY CREATED<br>";	

if(($result = mysqli_query($link, "CREATE TABLE IF NOT EXISTS `rush00`.`article` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(45) NOT NULL,
	`quantity` INT UNSIGNED NOT NULL,
	`image` VARCHAR(255),
	`price` INT NOT NULL,
	PRIMARY KEY (`id`)
	);")) === true)
	echo "ARTICLE CREATED<br>";

if(($result = mysqli_query($link, "CREATE TABLE IF NOT EXISTS `rush00`.`panier` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(45) NOT NULL,
	`articles` LONGTEXT,
	PRIMARY KEY (`id`)
	);")) === true)
	echo "PANIER CREATED<br>";

if(($result = mysqli_query($link, "CREATE TABLE IF NOT EXISTS `rush00`.`articles_has_category` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`article_id` INT UNSIGNED,
	`category_id` INT UNSIGNED,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`article_id`)
	REFERENCES `rush00`.`article` (`id`),
	FOREIGN KEY (`category_id`)
	REFERENCES `rush00`.`category` (`id`)
	);")) === true)
	echo "ARTICLES_HAS_CATEGORY CREATED<br>";


if (($result = mysqli_query($link, "INSERT INTO `rush00`.`user` (`username`, `password`, is_admin) VALUES ('admin', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94', 1)")) === true)
	echo "ADMIN ADDED<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`article` (`name`, `quantity`, `image`, `price`) VALUES ('Ananas', 1, 'img/ananas.jpg', 5)")) === true)
	echo "Article 'Ananas' created.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`article` (`name`, `quantity`, `image`, `price`) VALUES ('Avocat', 1, 'img/avocat.jpg', 5)")) === true)
	echo "Article 'Avocat' created.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`article` (`name`, `quantity`, `image`, `price`) VALUES ('Banane', 1, 'img/banane.jpg', 5)")) === true)
	echo "Article 'Banane' created.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`article` (`name`, `quantity`, `image`, `price`) VALUES ('Mangue', 1, 'img/mangue.jpg', 5)")) === true)
	echo "Article 'Mangue' created.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`article` (`name`, `quantity`, `image`, `price`) VALUES ('Tomate', 1, 'img/tomate.jpg', 5)")) === true)
	echo "Article 'Tomate' created.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`article` (`name`, `quantity`, `image`, `price`) VALUES ('Carotte', 1, 'img/carotte.png', 5)")) === true)
	echo "Article 'Carotte' created.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`article` (`name`, `quantity`, `image`, `price`) VALUES ('Salade', 1, 'img/salade.jpg', 5)")) === true)
	echo "Article 'Salade' created.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`category` (`name`) VALUES ('Fruits')")) === true)
	echo "Category 'Fruits' created.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`category` (`name`) VALUES ('Legumes')")) === true)
	echo "Category 'Legumes' created.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`articles_has_category` (`article_id`, `category_id`) VALUES (1, 1)")) === true)
	echo "Article 'Ananas' added to 'Fruits'.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`articles_has_category` (`article_id`, `category_id`) VALUES (2, 1)")) === true)
	echo "Article 'Avocat' added to 'Fruits'.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`articles_has_category` (`article_id`, `category_id`) VALUES (2, 2)")) === true)
	echo "Article 'Avocat' added to 'Legumes'.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`articles_has_category` (`article_id`, `category_id`) VALUES (3, 1)")) === true)
	echo "Article 'Banane' added to 'Fruits'.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`articles_has_category` (`article_id`, `category_id`) VALUES (4, 1)")) === true)
	echo "Article 'Mangue' added to 'Fruits'.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`articles_has_category` (`article_id`, `category_id`) VALUES (5, 1)")) === true)
	echo "Article 'Tomate' added to 'Fruits'.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`articles_has_category` (`article_id`, `category_id`) VALUES (5, 2)")) === true)
	echo "Article 'Tomate' added to 'Legumes'.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`articles_has_category` (`article_id`, `category_id`) VALUES (6, 2)")) === true)
	echo "Article 'Carotte' added to 'Legumes'.<br>";
if (($result = mysqli_query($link, "INSERT INTO `rush00`.`articles_has_category` (`article_id`, `category_id`) VALUES (7, 2)")) === true)
	echo "Article 'Salade' added to 'Legumes'.<br>";
session_start();
$_SESSION['panier'] = array();
$_SESSION['logged'] = false;