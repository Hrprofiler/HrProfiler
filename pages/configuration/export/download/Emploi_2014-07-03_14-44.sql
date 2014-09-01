-- SQL Dump
	--
	-- Generation: Thu, 03 Jul 2014 14:44:57 +0200
	-- MySQL version: 5.1.73-1.1+squeeze+build0+1-log
	-- PHP version: 5.4.29

	SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

	--
	-- Database: `hrprofil_bdd`
	--

--
-- Table structure: `Emploi`
--

CREATE TABLE `Emploi` (
  `id_emploi` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant emploi',
  `lib_emploi` varchar(200) NOT NULL COMMENT 'Libell� emploi',
  `descr_emploi` text NOT NULL COMMENT 'Description emploi',
  PRIMARY KEY (`id_emploi`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='Table emploi' ;

--
-- Table data: `Emploi`
--
INSERT INTO `Emploi` (`id_emploi`, `lib_emploi`, `descr_emploi`) VALUES 
('19', 'Electricien', 'Installation et maintenance des installations électrique'),
('20', 'Secrétaire ', 'Gère les dossiers professionels, les appels téléphoniques et l\'accueil des visiteurs'),
('21', 'Gardien de gymnase', 'Surveille l\'etat des locaux et equipements sportifs'),
('22', 'Mécanicien', 'Assure la réparation des véhicules'),
('23', 'Infirmier', 'Assure des soins médicaux au patient'),
('24', 'Ingénieur informatique', 'Supervise des projets '),
('25', 'Jardinier', 'Entretien les espaces verts'),
('26', 'Agriculteur', 'Procède à la culture de végétaux'),
('27', 'Logisticien', 'Supervise les flux de marchandises et de personnes'),
('28', 'Ingenieur Genie Civil', 'Supervise le deroulement d\'un chantier');