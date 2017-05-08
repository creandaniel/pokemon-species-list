-- Adminer 3.3.3 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `pokemon_species` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pokemon_species`;

DROP TABLE IF EXISTS `pokemon`;
CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `types` longtext COLLATE utf8_unicode_ci NOT NULL,
  `moves` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ability` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `pokemon` (`id`, `name`, `description`, `types`, `moves`, `ability`) VALUES
(1, 'pikachu',  'A mouse that generates electricity with its cheeks', 'Electric', 'Volt Tackle Thunderbolt Double Team Bite', 'Static'),
(2, 'Laprus', 'A rare mythical creature', 'Ice/Water',  'Ice Beam, Bubblebeam, Blizzard, Rain Dance', 'Water Absorb, Shell Armor'),
(3, 'dssdsd', 'sdsdsd', 'sdsdddddddddddddddddddd',  'sdsdsd', 'sdsdsd'),
(4, 'dssdsd', 'sdsdsd', 'sdsdddddddddddddddddddd',  'sdsdsd', 'sdsdsd'),
(5, 'dssdsd', 'sdsdsd', 'sdsdddddddddddddddddddd',  'sdsdsd', 'sdsdsd'),
(6, 'dssdsd', 'sdsdsd', 'sdsdddddddddddddddddddd',  'sdsdsd', 'sdsdsd'),
(7, 'dssdsd', 'sdsdsd', 'sdsdddddddddddddddddddd',  'sdsdsd', 'sdsdsd'),
(8, 'dssdsd', 'sdsdsd', 'sdsdddddddddddddddddddd',  'sdsdsd', 'sdsdsd'),
(9, 'dssdsd', 'sdsdsd', 'sdsdddddddddddddddddddd',  'sdsdsd', 'sdsdsd'),
(10,  'dssdsd', 'sdsdsd', 'sdsdddddddddddddddddddd',  'sdsdsd', 'sdsdsd'),
(11,  'dssdsd', 'sdsdsd', 'sdsdddddddddddddddddddd',  'sdsdsd', 'sdsdsd'),
(12,  'eeee', 'eeeeeeeeeeeeeeeee',  'eeeeeeeeeeeeeeeeeeeeeeeeeee',  'eeeeeeeeeeeeeeeeeeeeeee',  'eeeeeeeeeeee'),
(13,  'tttttt', 'ttttttttttttttt',  'ttttttttttttttt',  'ttttttttttttttt',  'tttttttttt'),
(14,  'ghg',  'gvgvsssss',  'gvvgsssssssssssssssssss',  'gvvgvg', 'Mental');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`id`, `email`, `name`, `role`, `password`) VALUES
(4, 'user@test.com',  'Daniel', 'ROLE_USER',  '$2y$13$j0AboUJh73fQqJ89dBvO6e3LPLE.KUEnEF1mo7nNUG0HY5z82yvcy');

-- 2017-03-09 11:53:25