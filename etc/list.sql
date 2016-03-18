-- Adminer 4.2.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `servers` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `servers`;
CREATE TABLE `servers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `servers` (`id`, `account_id`, `name`, `title`, `ip`, `port`, `version`, `site`, `description`) VALUES
(3,	0,	'Tibia Electro',	'GLOBAL 10.90 RL',	'www.tibiaelectro.com',	'7171',	'10.90',	'www.tibiaelectro.com',	'Global Server');

DROP TABLE IF EXISTS `versions`;
CREATE TABLE `versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `versions` (`id`, `version`) VALUES
(1,	'10.90'),
(3,	'8.60');

-- 2016-03-18 21:26:10
