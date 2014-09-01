-- SQL Dump
	--
	-- Generation: Sun, 18 May 2014 19:46:21 +0200
	-- MySQL version: 5.1.73-1.1+squeeze+build0+1-log
	-- PHP version: 5.4.27

	SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

	--
	-- Database: `hrprofil_bdd`
	--

--
-- Table structure: `Poste`
--

CREATE TABLE `Poste` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `occuper` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 ;

--
-- Table data: `Poste`
--
INSERT INTO `Poste` (`id`, `libelle`, `description`, `occuper`) VALUES 
('51', 'poste1', 'poste1', 'o'),
('52', 'poste2', 'poste2', 'o'),
('53', 'poste3', 'poste3', 'n'),
('54', 'poste4', 'poste4', 'n'),
('55', 'poste5', 'poste5', 'n'),
('56', 'poste6', 'poste6', 'n'),
('57', 'poste7', 'poste7', 'n'),
('59', 'poste9', 'poste1', 'n'),
('60', 'poste10', 'poste10', 'n'),
('61', 'poste 11', 'poste 11', '1'),
('62', '', '', '');