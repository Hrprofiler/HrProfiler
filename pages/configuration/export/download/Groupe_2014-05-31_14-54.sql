-- SQL Dump
	--
	-- Generation: Sat, 31 May 2014 14:54:32 +0200
	-- MySQL version: 5.1.73-1.1+squeeze+build0+1-log
	-- PHP version: 5.4.27

	SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

	--
	-- Database: `hrprofil_bdd`
	--

--
-- Table structure: `Groupe`
--

CREATE TABLE `Groupe` (
  `id_groupe` int(5) NOT NULL AUTO_INCREMENT,
  `lib_groupe` varchar(200) NOT NULL,
  PRIMARY KEY (`id_groupe`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 ;

--
-- Table data: `Groupe`
--
INSERT INTO `Groupe` (`id_groupe`, `lib_groupe`) VALUES 
('1', 'Admin'),
('2', 'Rh'),
('3', 'Visiteur');