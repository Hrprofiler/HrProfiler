-- SQL Dump
--
-- Generation: Sat, 24 May 2014 12:15:54 +0200
-- MySQL version: 5.1.73-1.1+squeeze+build0+1-log
-- PHP version: 5.4.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `hrprofil_bdd`
--

--
-- Table structure: `Activite_generique`
--

CREATE TABLE `Activite_generique` (
  `id_actgen` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant activité générique',
  `lib_actgen` varchar(200) NOT NULL COMMENT 'Libellé activité générique',
  `descr_actgen` text NOT NULL COMMENT 'Description activité générique',
  PRIMARY KEY (`id_actgen`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='Table activité générique' ;

--
-- Table data: `Activite_generique`
--
INSERT INTO `Activite_generique` (`id_actgen`, `lib_actgen`, `descr_actgen`) VALUES 
('7', 'Jardinier', 'Entretien parc'),
('8', 'boulanger', 'Fabrique du pain'),
('9', 'mecanicien', 'répare les voitures'),
('10', 'Electricien', 'Maintenance des installations éléctriques'),
('11', 'maçon', 'Génie civil'),
('12', 'Pilote de ligne', 'Pilote des avions'),
('13', 'Informatique', 'Travaille dans l\'informatique'),
('14', 'Secrétaire', 'Secrétaire'),
('15', 'Artisant', 'Artisanat'),
('16', 'Infirmier', 'Médicaux\r\n');

--
-- Table structure: `Activite_terrain`
--

CREATE TABLE `Activite_terrain` (
  `id_actter` int(5) NOT NULL AUTO_INCREMENT,
  `lib_actter` varchar(200) NOT NULL,
  `descr_actter` text NOT NULL,
  PRIMARY KEY (`id_actter`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='Table activité terrain' ;

--
-- Table data: `Activite_terrain`
--
INSERT INTO `Activite_terrain` (`id_actter`, `lib_actter`, `descr_actter`) VALUES 
('1', 'testterrain', 'testterraindmodif'),
('3', 'Jardinier municipal', 'Entretien des parc public'),
('4', 'Pilote chez Air France', 'Pilote les avion'),
('5', 'Mécanicien chez Peugeot', 'Mécanicien chez Peugeot'),
('6', 'Boulanger', 'Boulanger'),
('7', 'Électricien chez EDF', 'Électricien chez EDF'),
('8', 'Infirmier hospitalier', 'Infirmier hospitalier'),
('9', 'Secrétaire', 'Secrétaire'),
('10', 'Informaticien chez MS', 'Informaticien chez MS'),
('11', 'Artisant', 'Artisant'),
('12', 'Maçon', 'Maçon');

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

--
-- Table structure: `Competence`
--

CREATE TABLE `Competence` (
  `id_competence` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant compétence',
  `lib_competence` varchar(200) NOT NULL COMMENT 'Libellé compétence',
  `descr_competence` text NOT NULL COMMENT 'Description compétence',
  `type_competence` varchar(255) NOT NULL COMMENT 'Type compétence',
  PRIMARY KEY (`id_competence`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8 COMMENT='Table compétence' ;

--
-- Table data: `Competence`
--
INSERT INTO `Competence` (`id_competence`, `lib_competence`, `descr_competence`, `type_competence`) VALUES 
('1', 'jardinage', 'entretien parc', 'entretien parc'),
('2', 'comp1', 'desc1', 'a\r\n'),
('3', 'comp2', 'desc2', 'b\r\n'),
('4', 'comp3', 'desc3', 'c\r\n'),
('5', 'comp4', 'desc4', 'd'),
('6', 'comp1', 'desc1', 'a\r\n'),
('7', 'comp2', 'desc2', 'b\r\n'),
('8', 'comp3', 'desc3', 'c\r\n'),
('9', 'comp4', 'desc4', 'd'),
('10', 'comp1', 'desc1', 'a\r\n'),
('11', 'comp2', 'desc2', 'b\r\n'),
('12', 'comp3', 'desc3', 'c\r\n'),
('13', 'comp4', 'desc4', 'd'),
('14', 'comp1', 'desc1 test1', 'a\r\n'),
('15', 'comp2', 'desc2 test2', 'b\r\n'),
('16', 'comp3', 'desc3 test3', 'c\r\n'),
('17', 'comp4', 'desc4 test4', 'd'),
('18', 'comp1', 'desc1 test1', 'a b\r\n'),
('19', 'comp2', 'desc2 test2', 'b c\r\n'),
('20', 'comp3', 'desc3 test3', 'c d\r\n'),
('21', 'comp4', 'desc4 test4', 'd e'),
('22', 'comp1', 'desc1', 'a\r\n'),
('23', 'comp2', 'desc2', 'b\r\n'),
('24', 'comp3', 'desc3', 'c\r\n'),
('25', 'comp4', 'desc4', 'd'),
('26', 'comp1', 'desc1', 'a\r\n'),
('27', 'comp2', 'desc2', 'b\r\n'),
('28', 'comp3', 'desc3', 'c\r\n'),
('29', 'comp4', 'desc4', 'd'),
('30', 'comp1', 'desc1', 'a\r\n'),
('31', 'comp2', 'desc2', 'b\r\n'),
('32', 'comp3', 'desc3', 'c\r\n'),
('33', 'comp4', 'desc4', 'd'),
('34', 'comp1', 'desc1', 'a\r\n'),
('35', 'comp2', 'desc2', 'b\r\n'),
('36', 'comp3', 'desc3', 'c\r\n'),
('37', 'comp4', 'desc4', 'd'),
('38', 'comp1', 'desc1', 'a\r\n'),
('39', 'comp2', 'desc2', 'b\r\n'),
('40', 'comp3', 'desc3', 'c\r\n'),
('41', 'comp4', 'desc4', 'd'),
('42', 'comp1', 'desc1', 'a\r\n'),
('43', 'comp2', 'desc2', 'b\r\n'),
('44', 'comp3', 'desc3', 'c\r\n'),
('45', 'comp4', 'desc4', 'd'),
('46', 'comp1', 'desc1', 'a\r\n'),
('47', 'comp2', 'desc2', 'b\r\n'),
('48', 'comp3', 'desc3', 'c\r\n'),
('49', 'comp4', 'desc4', 'd'),
('50', 'comp1', 'desc1', 'a\r\n'),
('51', 'comp2', 'desc2', 'b\r\n'),
('52', 'comp3', 'desc3', 'c\r\n'),
('53', 'comp4', 'desc4', 'd'),
('54', 'comp1', 'desc1', 'a\r\n'),
('55', 'comp2', 'desc2', 'b\r\n'),
('56', 'comp3', 'desc3', 'c\r\n'),
('57', 'comp4', 'desc4', 'd'),
('58', 'comp1', 'desc1', 'a\r\n'),
('59', 'comp2', 'desc2', 'b\r\n'),
('60', 'comp3', 'desc3', 'c\r\n'),
('61', 'comp4', 'desc4', 'd'),
('62', 'comp1', 'desc1', 'a\r\n'),
('63', 'comp2', 'desc2', 'b\r\n'),
('64', 'comp3', 'desc3', 'c\r\n'),
('65', 'comp4', 'desc4', 'd'),
('66', 'comp1', 'desc1', 'a\r\n'),
('67', 'comp2', 'desc2', 'b\r\n'),
('68', 'comp3', 'desc3', 'c\r\n'),
('69', 'comp4', 'desc4', 'd'),
('70', 'comp1', 'desc1', 'a\r\n'),
('71', 'comp2', 'desc2', 'b\r\n'),
('72', 'comp3', 'desc3', 'c\r\n'),
('73', 'comp4', 'desc4', 'd'),
('74', 'comp1', 'desc1', 'a\r\n'),
('75', 'comp2', 'desc2', 'b\r\n'),
('76', 'comp3', 'desc3', 'c\r\n'),
('77', 'comp4', 'desc4', 'd'),
('78', 'comp1', 'desc1', 'a\r\n'),
('79', 'comp2', 'desc2', 'b\r\n'),
('80', 'comp3', 'desc3', 'c\r\n'),
('81', 'comp4', 'desc4', 'd'),
('82', 'comp1', 'desc1', 'a\r\n'),
('83', 'comp2', 'desc2', 'b\r\n'),
('84', 'comp3', 'desc3', 'c\r\n'),
('85', 'comp4', 'desc4', 'd'),
('86', 'comp1', 'desc1', 'a\r\n'),
('87', 'comp2', 'desc2', 'b\r\n'),
('88', 'comp3', 'desc3', 'c\r\n'),
('89', 'comp4', 'desc4', 'd'),
('90', 'comp1', 'desc1', 'a\r\n'),
('91', 'comp2', 'desc2', 'b\r\n'),
('92', 'comp3', 'desc3', 'c\r\n'),
('93', 'comp4', 'desc4', 'd'),
('94', 'comp1', 'desc1', 'a\r\n'),
('95', 'comp2', 'desc2', 'b\r\n'),
('96', 'comp3', 'desc3', 'c\r\n'),
('97', 'comp4', 'desc4', 'd'),
('98', 'comp1', 'desc1', 'a\r\n'),
('99', 'comp2', 'desc2', 'b\r\n'),
('100', 'comp3', 'desc3', 'c\r\n'),
('101', 'comp4', 'desc4', 'd'),
('102', 'comp1', 'desc1', 'a\r\n'),
('103', 'comp2', 'desc2', 'b\r\n'),
('104', 'comp3', 'desc3', 'c\r\n'),
('105', 'comp4', 'desc4', 'd'),
('106', 'comp1', 'desc1', 'a\r\n'),
('107', 'comp2', 'desc2', 'b\r\n'),
('108', 'comp3', 'desc3', 'c\r\n'),
('109', 'comp4', 'desc4', 'd'),
('110', 'comp1', 'desc1', 'a\r\n'),
('111', 'comp2', 'desc2', 'b\r\n'),
('112', 'comp3', 'desc3', 'c\r\n'),
('113', 'comp4', 'desc4', 'd'),
('114', 'comp1', 'desc1', 'a\r\n'),
('115', 'comp2', 'desc2', 'b\r\n'),
('116', 'comp3', 'desc3', 'c\r\n'),
('117', 'comp4', 'desc4', 'd'),
('118', '', '', ''),
('119', '', '', ''),
('120', '', '', ''),
('121', '', '', ''),
('122', '', '', ''),
('123', '', '', ''),
('124', '', '', ''),
('125', '', '', ''),
('126', '', '', ''),
('127', '', '', ''),
('128', '', '', ''),
('129', '', '', ''),
('130', '', '', ''),
('131', '', '', ''),
('132', '', '', ''),
('133', '', '', ''),
('134', '', '', ''),
('135', '', '', ''),
('136', '', '', ''),
('137', '', '', ''),
('138', '', '', ''),
('139', '', '', ''),
('140', '', '', ''),
('141', '', '', ''),
('142', '', '', ''),
('143', '', '', ''),
('144', '', '', ''),
('145', '', '', ''),
('146', '', '', ''),
('147', '', '', ''),
('148', '', '', ''),
('149', '', '', ''),
('150', '', '', ''),
('151', '', '', ''),
('152', '', '', ''),
('153', '', '', ''),
('154', '', '', ''),
('155', '', '', ''),
('156', '', '', ''),
('157', '', '', ''),
('158', '', '', ''),
('159', '', '', ''),
('160', '', '', ''),
('161', '', '', ''),
('162', '', '', ''),
('163', '', '', ''),
('164', '', '', ''),
('165', '', '', ''),
('166', '', '', ''),
('167', '', '', ''),
('168', '', '', ''),
('169', '', '', ''),
('170', '', '', ''),
('171', '', '', ''),
('172', '', '', ''),
('173', '', '', ''),
('174', '', '', ''),
('175', '', '', ''),
('176', '', '', ''),
('177', '', '', ''),
('178', '', '', ''),
('179', '', '', ''),
('180', '', '', ''),
('181', '', '', ''),
('182', '', '', ''),
('183', '', '', ''),
('184', '', '', ''),
('185', '', '', ''),
('186', '', '', ''),
('187', '', '', ''),
('188', '', '', ''),
('189', '', '', ''),
('190', '', '', ''),
('191', '', '', ''),
('192', '', '', ''),
('193', '', '', ''),
('194', '', '', ''),
('195', '', '', ''),
('196', '', '', ''),
('197', '', '', ''),
('198', '', '', ''),
('199', '', '', ''),
('200', '', '', ''),
('201', '', '', ''),
('202', '', '', ''),
('203', '', '', ''),
('204', '', '', ''),
('205', '', '', ''),
('206', '', '', ''),
('207', '', '', ''),
('208', '', '', ''),
('209', '', '', ''),
('210', '', '', '');

--
-- Table structure: `Emploi`
--

CREATE TABLE `Emploi` (
  `id_emploi` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant emploi',
  `lib_emploi` varchar(200) NOT NULL COMMENT 'Libellé emploi',
  `descr_emploi` text NOT NULL COMMENT 'Description emploi',
  PRIMARY KEY (`id_emploi`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='Table emploi' ;

--
-- Table data: `Emploi`
--
INSERT INTO `Emploi` (`id_emploi`, `lib_emploi`, `descr_emploi`) VALUES 
('6', 'Jardinier ', 'Jardinier'),
('7', 'emploi1', 'emploi1'),
('8', 'emploi2', 'emploi2'),
('9', 'emploi3', 'emploi3'),
('10', 'emploi4', 'emploi4'),
('11', 'emploi5', 'emploi5'),
('12', 'emploi6', 'emploi6'),
('13', 'emploi7', 'emploi7'),
('14', 'emploi8', 'emploi8'),
('15', 'emploi9', 'emploi9'),
('16', 'emploi10', 'emploi10'),
('17', '', ''),
('18', '', '');

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

--
-- Table structure: `Lien_activite_Competence`
--

CREATE TABLE `Lien_activite_Competence` (
  `id_actgen` int(5) NOT NULL COMMENT 'Identifiant activité générique (clé étrangère)',
  `id_actter` int(5) NOT NULL COMMENT 'Identifiant activité terrain (clé étrangère)',
  `id_competence` int(5) NOT NULL COMMENT 'Identifiant compétence (clé étrangère)',
  PRIMARY KEY (`id_actgen`,`id_actter`,`id_competence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre lien activité génériques/terrain et ' ;

--
-- Table data: `Lien_activite_Competence`
--
INSERT INTO `Lien_activite_Competence` (`id_actgen`, `id_actter`, `id_competence`) VALUES 
('7', '1', '1'),
('7', '1', '2'),
('8', '3', '2'),
('9', '4', '3'),
('10', '5', '4'),
('11', '6', '5'),
('12', '7', '6'),
('13', '8', '7'),
('14', '9', '8'),
('15', '10', '9'),
('16', '11', '10');

--
-- Table structure: `Lien_activite_generique_Activite_terrain`
--

CREATE TABLE `Lien_activite_generique_Activite_terrain` (
  `id_actgen` int(5) NOT NULL COMMENT 'Identifiant activité générique (clé étrangère)',
  `id_actter` int(5) NOT NULL COMMENT 'Identifiant activité terrain (clé étrangère)',
  PRIMARY KEY (`id_actgen`,`id_actter`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre activité générique et activité terra' ;

--
-- Table data: `Lien_activite_generique_Activite_terrain`
--
INSERT INTO `Lien_activite_generique_Activite_terrain` (`id_actgen`, `id_actter`) VALUES 
('1', '7'),
('7', '1'),
('8', '2'),
('9', '3'),
('10', '4'),
('11', '5'),
('12', '6'),
('13', '7'),
('14', '8'),
('15', '9'),
('16', '10');

--
-- Table structure: `Lien_competence_portefeuille`
--

CREATE TABLE `Lien_competence_portefeuille` (
  `id_competence` int(200) NOT NULL COMMENT 'Identifiant competence',
  `id_portefeuille` int(200) NOT NULL COMMENT 'Identifiant portefeuille',
  PRIMARY KEY (`id_competence`,`id_portefeuille`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre compétence et portefeuille' ;

--
-- Table data: `Lien_competence_portefeuille`
--
INSERT INTO `Lien_competence_portefeuille` (`id_competence`, `id_portefeuille`) VALUES 
('1', '8'),
('1', '9'),
('2', '10'),
('3', '11'),
('4', '12'),
('5', '13'),
('6', '14'),
('7', '15'),
('8', '16'),
('9', '17'),
('10', '18');

--
-- Table structure: `Lien_emploi_Activite_generique`
--

CREATE TABLE `Lien_emploi_Activite_generique` (
  `id_emploi` varchar(5) NOT NULL COMMENT 'Identifiant emploi',
  `id_actgen` varchar(5) NOT NULL COMMENT 'Identifiant activité générique',
  PRIMARY KEY (`id_emploi`,`id_actgen`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre "emploi" et "Activite_generique"' ;

--
-- Table data: `Lien_emploi_Activite_generique`
--
INSERT INTO `Lien_emploi_Activite_generique` (`id_emploi`, `id_actgen`) VALUES 
('10', '11'),
('11', '12'),
('12', '13'),
('13', '14'),
('14', '15'),
('15', '16'),
('6', '16'),
('6', '7'),
('7', '8'),
('8', '9'),
('9', '10');

--
-- Table structure: `Lien_emploi_Portefeuille`
--

CREATE TABLE `Lien_emploi_Portefeuille` (
  `id_emploi` int(5) NOT NULL COMMENT 'Identifiant emploi (clé étrangère)',
  `id_portefeuille` int(5) NOT NULL COMMENT 'Identifiant portefeuille (clé étrangère)',
  PRIMARY KEY (`id_emploi`,`id_portefeuille`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation en emploi et portefeuille' ;

--
-- Table data: `Lien_emploi_Portefeuille`
--
INSERT INTO `Lien_emploi_Portefeuille` (`id_emploi`, `id_portefeuille`) VALUES 
('6', '8'),
('6', '17'),
('7', '16'),
('8', '15'),
('9', '14'),
('10', '13'),
('11', '12'),
('12', '11'),
('13', '10'),
('14', '9'),
('15', '8');

--
-- Table structure: `Lien_emploi_Profil_poste`
--

CREATE TABLE `Lien_emploi_Profil_poste` (
  `id_emploi` int(5) NOT NULL COMMENT 'Identifiant emploi (clé étrangère)',
  `id_profil_poste` int(5) NOT NULL COMMENT 'Identifiant profil de poste (clé étrangère)',
  PRIMARY KEY (`id_emploi`,`id_profil_poste`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre "Emploi" et "Profil_poste"' ;

--
-- Table data: `Lien_emploi_Profil_poste`
--
INSERT INTO `Lien_emploi_Profil_poste` (`id_emploi`, `id_profil_poste`) VALUES 
('6', '1'),
('6', '4'),
('7', '5'),
('8', '6'),
('9', '7'),
('10', '8'),
('11', '9'),
('12', '10'),
('13', '11'),
('14', '12'),
('15', '13');

--
-- Table structure: `Lien_portefeuille_Collaborateur`
--

CREATE TABLE `Lien_portefeuille_Collaborateur` (
  `id_portefeuille` int(5) NOT NULL COMMENT 'Identifiant portefeuille (clé étrangère)',
  `id_collaborateur` int(5) NOT NULL COMMENT 'Identifiant collaborateur (clé étrangère)',
  PRIMARY KEY (`id_portefeuille`,`id_collaborateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre portefeuille et collaborateur' ;

--
-- Table data: `Lien_portefeuille_Collaborateur`
--
INSERT INTO `Lien_portefeuille_Collaborateur` (`id_portefeuille`, `id_collaborateur`) VALUES 
('8', '1'),
('9', '11'),
('10', '10'),
('11', '9'),
('12', '8'),
('13', '7'),
('14', '6'),
('15', '5'),
('16', '4'),
('17', '3'),
('18', '2');

--
-- Table structure: `Lien_poste_Activite_terrain`
--

CREATE TABLE `Lien_poste_Activite_terrain` (
  `id_poste` int(5) NOT NULL COMMENT 'Identifiant poste (clé étrangère)',
  `id_actter` int(5) NOT NULL COMMENT 'Identifiant activité terrain (clé étrangère)',
  PRIMARY KEY (`id_poste`,`id_actter`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre poste et Activité terrain' ;

--
-- Table data: `Lien_poste_Activite_terrain`
--
INSERT INTO `Lien_poste_Activite_terrain` (`id_poste`, `id_actter`) VALUES 
('1', '1'),
('51', '12'),
('52', '11'),
('53', '10'),
('54', '9'),
('55', '8'),
('56', '7'),
('57', '6'),
('58', '5'),
('59', '4'),
('60', '3');

--
-- Table structure: `Lien_poste_Profil_poste`
--

CREATE TABLE `Lien_poste_Profil_poste` (
  `id_profil_poste` int(5) NOT NULL COMMENT 'Identifiant clé primaire table "Profil_poste"',
  `id_poste` int(5) NOT NULL COMMENT 'Identifiant clé primaire table "Poste"',
  PRIMARY KEY (`id_profil_poste`,`id_poste`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre "Profil_poste" et "Poste"' ;

--
-- Table data: `Lien_poste_Profil_poste`
--
INSERT INTO `Lien_poste_Profil_poste` (`id_profil_poste`, `id_poste`) VALUES 
('1', '22'),
('4', '60'),
('5', '59'),
('6', '58'),
('7', '57'),
('8', '56'),
('9', '55'),
('10', '54'),
('11', '53'),
('12', '52'),
('13', '21');

--
-- Table structure: `Lien_profil_poste_Activite_terrain`
--

CREATE TABLE `Lien_profil_poste_Activite_terrain` (
  `id_pp` int(5) NOT NULL COMMENT 'Identifiant profil de poste (clé étrangère)',
  `id_actter` int(5) NOT NULL COMMENT 'Identifiant activité terrain (clé étrangère)',
  PRIMARY KEY (`id_pp`,`id_actter`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre activité générique et ' ;

--
-- Table data: `Lien_profil_poste_Activite_terrain`
--
INSERT INTO `Lien_profil_poste_Activite_terrain` (`id_pp`, `id_actter`) VALUES 
('1', '1'),
('4', '1'),
('5', '3'),
('6', '4'),
('7', '5'),
('8', '6'),
('9', '7'),
('10', '8'),
('11', '9'),
('12', '10'),
('13', '11');

--
-- Table structure: `Portefeuille`
--

CREATE TABLE `Portefeuille` (
  `id_portefeuille` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant portefeuille',
  `lib_portefeuille` varchar(200) NOT NULL COMMENT 'Libellé portefeuille',
  PRIMARY KEY (`id_portefeuille`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='Table portefeuille' ;

--
-- Table data: `Portefeuille`
--
INSERT INTO `Portefeuille` (`id_portefeuille`, `lib_portefeuille`) VALUES 
('9', 'Portefeuille1'),
('10', 'Portefeuille2'),
('11', 'Portefeuille3'),
('12', 'Portefeuille4'),
('13', 'Portefeuille5'),
('14', 'Portefeuille6'),
('15', 'Portefeuille8'),
('16', 'Portefeuille9'),
('17', 'Portefeuille10');

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
('4', 'profil1'),
('5', 'profil2'),
('6', 'profil3'),
('7', 'profil4'),
('8', 'profil5'),
('9', 'profil6'),
('10', 'profil7'),
('11', 'profil8'),
('12', 'profil9'),
('13', 'profil10'),
('14', 'profil1'),
('15', 'profil2'),
('16', 'profil3'),
('17', 'profil4'),
('18', 'profil5'),
('19', 'profil6'),
('20', 'profil7'),
('21', 'profil8'),
('22', 'profil9'),
('23', 'profil10'),
('24', ''),
('25', ''),
('26', ''),
('27', ''),
('28', ''),
('29', ''),
('30', ''),
('31', ''),
('32', ''),
('33', ''),
('34', ''),
('35', ''),
('36', ''),
('37', ''),
('38', ''),
('39', ''),
('40', ''),
('41', ''),
('42', ''),
('43', ''),
('44', ''),
('45', ''),
('46', ''),
('47', ''),
('48', ''),
('49', '');

--
-- Table structure: `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `login_user` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass_user` varchar(250) NOT NULL,
  `nom_user` varchar(200) NOT NULL,
  `prenom_user` varchar(200) NOT NULL,
  `mail_user` varchar(200) NOT NULL,
  `id_groupe` int(5) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ;

--
-- Table data: `Utilisateur`
--
INSERT INTO `Utilisateur` (`id_user`, `login_user`, `pass_user`, `nom_user`, `prenom_user`, `mail_user`, `id_groupe`) VALUES 
('10', 'vmp', 'c0ffef9b7eef64fc9a6f35324211cf61da7a2415', 'Pion', 'Vlad', 'vmp@hr-profiler.com', '3'),
('11', 'lolo', 'a7ca81c17d0ab3e5c2d7dbe755b30aea799d7b1e', 'M', 'lolo', 'lolo@lolilol.fr', '0'),
('12', 'tony', 'f8b242668373d6e0bd21738098af6d126c5ad200', 'C', 'T', 'tonytruant@hr-profiler.com', '0'),
('13', 'test', '2f7b56fd6ed8ce2de57cc5117b617391028bab59', 'test', 'test', 'test@test.test', '3');