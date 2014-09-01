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
-- Table structure: `Profil_poste`
--

CREATE TABLE `Profil_poste` (
  `id_profil_poste` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant profil de poste',
  `lib_profil_poste` varchar(200) NOT NULL COMMENT 'Libellé profil de poste',
  PRIMARY KEY (`id_profil_poste`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COMMENT='Table profil de poste' ;

--
-- Table data: `Profil_poste`
--
INSERT INTO `Profil_poste` (`id_profil_poste`, `lib_profil_poste`) VALUES 
('10', 'profil7'),
('14', 'profil1'),
('15', 'profil2'),
('16', 'profil3'),
('17', 'profil4'),
('18', 'profil5'),
('19', 'profil6'),
('20', 'profil7'),
('21', 'profil8'),
('22', 'profil9'),
('23', 'profil10');