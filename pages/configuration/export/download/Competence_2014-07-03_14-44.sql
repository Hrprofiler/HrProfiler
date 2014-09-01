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
-- Table structure: `Competence`
--

CREATE TABLE `Competence` (
  `id_competence` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant comp�tence',
  `lib_competence` varchar(200) NOT NULL COMMENT 'Libell� comp�tence',
  `descr_competence` text NOT NULL COMMENT 'Description comp�tence',
  `type_competence` varchar(255) NOT NULL COMMENT 'Type comp�tence',
  PRIMARY KEY (`id_competence`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8 COMMENT='Table comp�tence' ;

--
-- Table data: `Competence`
--
INSERT INTO `Competence` (`id_competence`, `lib_competence`, `descr_competence`, `type_competence`) VALUES 
('211', 'Reparation de moteur diesel', 'Connaissances des moteurs diesel', 'Compétence'),
('212', 'Controleur salles opérations', 'Verifier les locaux médicaux', 'Compétence'),
('213', 'Tracabilite des produits', 'Connaître la gestion de produits', 'Savoir-faire'),
('214', 'Administratives des transports', 'Connaitre les reglementations', 'Compétence'),
('215', 'Maquetter une application web', 'Connaissance en webdesign', 'Savoir-faire'),
('216', 'Accueil de la clientèle', 'Accueillir les clients et les renseigner', 'Savoir-faire'),
('217', 'Suivre un chantier', 'Savoir gérer un chantier', 'Savoir-faire'),
('218', 'Tailler les vegetaux', 'Savoir utiliser des outils pour élaguer', 'Compétence'),
('219', 'Raccordement éléctrique', 'Savoir lire un schéma éléctrique', 'Compétence'),
('220', 'Entretien des équipements', 'Reparer les équipements defectueux', 'Compétence');