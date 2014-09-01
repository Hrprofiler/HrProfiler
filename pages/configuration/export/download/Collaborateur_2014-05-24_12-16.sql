-- SQL Dump
	--
	-- Generation: Sat, 24 May 2014 12:16:12 +0200
	-- MySQL version: 5.1.73-1.1+squeeze+build0+1-log
	-- PHP version: 5.4.27

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
  `societe_collaborateur` varchar(200) NOT NULL COMMENT 'Société collaborateur',
  `service_collaborateur` varchar(200) NOT NULL COMMENT 'Service collaborateur',
  `sexe_collaborateur` varchar(5) NOT NULL COMMENT 'Sexe collaborateur',
  `tel_collaborateur` varchar(20) NOT NULL COMMENT 'Numéro téléphone collaborateur',
  `adresse_collaborateur` varchar(200) NOT NULL COMMENT 'Adresse collaborateur',
  `cp_collaborateur` int(5) NOT NULL COMMENT 'Code postal collaborateur',
  `ville_collaborateur` varchar(60) NOT NULL COMMENT 'Ville collaborateur',
  `mail_collaborateur` varchar(200) NOT NULL COMMENT 'eMail du collaborateur',
  PRIMARY KEY (`id_collaborateur`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COMMENT='Table collaborateurs' ;

--
-- Table data: `Collaborateur`
--
INSERT INTO `Collaborateur` (`id_collaborateur`, `nom_collaborateur`, `prenom_collaborateur`, `naissance_collaborateur`, `societe_collaborateur`, `service_collaborateur`, `sexe_collaborateur`, `tel_collaborateur`, `adresse_collaborateur`, `cp_collaborateur`, `ville_collaborateur`, `mail_collaborateur`) VALUES 
('1', 'collaborateur1', 'collaborateur1', '2014-05-01', 'azerty', 'Informatique', 'homme', '06.01.23.45.56', '8 cours albert thomas', '69000', 'Lyon', 'toto.tata@ass.com'),
('2', 'collaborateur2', 'collaborateur2', '2014-05-14', 'SNCF', 'Cheminot', 'homme', '060000000', '5eme avenue', '0', 'Paris', 'test@gmail.com'),
('3', 'collaborateur3', 'collaborateur3', '0000-00-00', 'Carrefour', 'Carrefour', 'Homme', '04000000', 'Carrefour', '0', 'Marseille', 'test@gmail.com'),
('4', 'collaborateur4', 'collaborateur4', '0000-00-00', 'EDF', 'EDF', 'Homme', '060000000', 'adresse bidon', '0', 'Paris', 'test@ymail.com'),
('5', 'collaborateur5', 'collaborateur5', '0000-00-00', 'GDF', 'GDF', 'Femme', '00666666', 'adresse Bidon', '0', 'Marseille', 'test@gmail.com'),
('6', 'collaborateur6', 'collaborateur6', '0000-00-00', 'Fnac', 'Vente', 'femme', '06442026', 'adresse', '0', 'Paris', 'test@hotmail.com'),
('7', 'collaborateur7', 'collaborateur7', '0000-00-00', 'Orange', 'Technicien', 'homme', '04000000', 'adresse bidon', '0', 'Paris', 'test@gmail.com'),
('8', 'collaborateur8', 'collaborateur8', '0000-00-00', 'Sony', 'Recherche', 'homme', '04000000', 'adresse bidon', '0', 'Paris', 'Test@orange.com'),
('9', 'collaborateur9', 'collaborateur9', '0000-00-00', 'Renault', 'Mecano', 'homme', '060000000', 'Lyon street', '0', 'Lyon', 'toto@test.com'),
('10', 'collaborateur10', 'collaborateur10', '0000-00-00', 'MS', 'Info', 'homme', '06000000', 'Champ Elysée', '0', 'Paris', 'test@gmail.com'),
('11', 'DARK ', 'Vador', '1000-12-22', 'disney', 'star wars', 'poney', '06 66 66 66 66', '666 Jedi street', '87000', 'Tatooine', 'vador.dark@lucascompany'),
('12', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('13', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('14', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('15', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('16', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('17', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('18', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('19', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('20', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('21', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('22', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('23', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('24', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('25', 'QQ', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('26', '5', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('27', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('28', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('29', '.j]0', 'q', '0000-00-00', '', '', '', '', '', '0', '', ''),
('30', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('31', 'pvc2!#l', 'N', '0000-00-00', 'E', '', '', '', '', '0', '', ''),
('32', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('33', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('34', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('35', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('36', '],', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('37', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('38', '', 'B', '0000-00-00', '', '', '', '', '', '0', '', ''),
('39', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('40', '#?', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('41', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('42', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('43', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('44', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('45', 'oH*', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('46', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('47', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('48', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('49', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('50', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('51', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('52', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('53', '\\', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('54', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('55', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('56', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('57', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('58', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('59', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('60', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('61', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('62', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('63', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('64', ' ', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('65', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('66', '8', 'oD', '0000-00-00', '', '', '', '', '', '0', '', ''),
('67', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('68', '?', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('69', '', '', '0000-00-00', '', '', '', '', '', '0', '', ''),
('70', '7\0\0word/fontTable.xmlPK-\0\0\0\0\0\0!\0', '', '0000-00-00', '', '', '', '', '', '0', '', '');