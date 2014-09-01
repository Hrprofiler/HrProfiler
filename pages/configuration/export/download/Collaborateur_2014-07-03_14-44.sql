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
-- Table structure: `Collaborateur`
--

CREATE TABLE `Collaborateur` (
  `id_collaborateur` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant collaborateur',
  `nom_collaborateur` varchar(60) NOT NULL COMMENT 'Nom collaborateur',
  `prenom_collaborateur` varchar(60) NOT NULL COMMENT 'Prenom collaborateur',
  `naissance_collaborateur` date NOT NULL COMMENT 'Date de naissance collaborateur',
  `societe_collaborateur` varchar(200) NOT NULL COMMENT 'Soci�t� collaborateur',
  `service_collaborateur` varchar(200) NOT NULL COMMENT 'Service collaborateur',
  `sexe_collaborateur` varchar(5) NOT NULL COMMENT 'Sexe collaborateur',
  `tel_collaborateur` varchar(20) NOT NULL COMMENT 'Num�ro t�l�phone collaborateur',
  `adresse_collaborateur` varchar(200) NOT NULL COMMENT 'Adresse collaborateur',
  `cp_collaborateur` int(5) NOT NULL COMMENT 'Code postal collaborateur',
  `ville_collaborateur` varchar(60) NOT NULL COMMENT 'Ville collaborateur',
  `mail_collaborateur` varchar(200) NOT NULL COMMENT 'eMail du collaborateur',
  PRIMARY KEY (`id_collaborateur`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COMMENT='Table collaborateurs' ;

--
-- Table data: `Collaborateur`
--
INSERT INTO `Collaborateur` (`id_collaborateur`, `nom_collaborateur`, `prenom_collaborateur`, `naissance_collaborateur`, `societe_collaborateur`, `service_collaborateur`, `sexe_collaborateur`, `tel_collaborateur`, `adresse_collaborateur`, `cp_collaborateur`, `ville_collaborateur`, `mail_collaborateur`) VALUES 
('71', 'Martin', 'Pierre', '1970-01-10', 'EDF', 'Technique', 'Homme', '0410458799', '10 Cours Lafayette', '69003', 'Lyon', 'martin.pierre@outlook. com'),
('72', 'Pariseau', 'Pascal', '1985-01-12', 'Gynmase municipal', 'Technique', 'Homme', '04.75.87.14.72', '24, rue Victor Hugo', '91100', 'Corbeil-Essones', 'Pascal.Pariseau@orange.com'),
('73', 'Béland', 'Claire', '0000-00-00', 'Adecco', 'Comptabilité', 'Femme', '04.77.87.21.33', '56, Avenue De Marlioz', '74100', 'Annemasse', 'Claire.Béland@yahoo.com'),
('74', 'Martineau', 'Romain', '1989-10-15', 'Gefco ', 'Logistique', 'Homme', ' 01.87.43.92.71', '57, rue Victor Hugo', '78700', 'Conflans-Saintes-Honorine', ' RomainMartineau@gmail.com'),
('75', 'Barros-Oliveira', 'Vitor ', '1980-05-14', 'Vinci', 'Travaux publics', 'Homme', '02.29.78.81.30', '83, rue Victor Hugo', '29900', 'Concarneau', 'Barros.Oliveira@outlook.com'),
('76', 'Durand', 'Jacques', '1965-01-14', 'Centre hospitalier', 'Anestésie', 'Homme', ' 02.25.68.04.63', '60, avenue du Marechal Juin', '97450', 'Saint-Louis', 'durand.jacques@free.fr'),
('77', 'Rivard', 'Gérard', '1955-07-05', 'Renault', 'Mécanique', 'Homme', '02.44.30.27.20', '75, route de Lyon', '37300', 'Joué-Les-Tours', 'gerard.rivard@gmail.com'),
('78', 'Dupont', 'Jean', '1964-02-15', 'Cap Gemini', 'Developpement', 'Homme', ' 01.69.85.07.20', '58, rue Saint Germain', '93220', 'Gagny', 'dupont.jean@orange.fr'),
('79', 'Saindon', 'Eloise', '0000-00-00', 'Municipalité', 'Entretien', 'Femme', ' 04.71.94.22.24', '45, Avenue des Pres', '3100', 'Montluçon', ' Eloise.Saindon@orange.com'),
('80', 'Carrière', 'Marcel', '0000-00-00', 'Cooperative agricole', 'Agricole', 'Homme', ' 05.29.33.46.07', '65, rue du Gue Jacquet', '86100', 'Châtellerault', 'marcel.carrire@gmail.com');