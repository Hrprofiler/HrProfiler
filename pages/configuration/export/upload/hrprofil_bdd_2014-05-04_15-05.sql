-- SQL Dump
---- Generation: Sun, 04 May 2014 15:05:28 +0000-- MySQL version: 5.6.12-log-- PHP version: 5.4.12
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
---- Database: `hrprofil_bdd`--

--
-- Table structure: `activite_generique`
--

CREATE TABLE `activite_generique` (
  `id_actgen` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant activité générique',
  `lib_actgen` varchar(200) NOT NULL COMMENT 'Libellé activité générique',
  `descr_actgen` text NOT NULL COMMENT 'Description activité générique',
  PRIMARY KEY (`id_actgen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table activité générique' ;

--
-- Table structure: `activite_terrain`
--

CREATE TABLE `activite_terrain` (
  `id_actter` int(5) NOT NULL AUTO_INCREMENT,
  `lib_actter` varchar(200) NOT NULL,
  `descr_actter` text NOT NULL,
  PRIMARY KEY (`id_actter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table activité terrain' ;

--
-- Table structure: `collaborateur`
--

CREATE TABLE `collaborateur` (
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='Table collaborateurs' ;

--
-- Table data: `collaborateur`
--
INSERT INTO `collaborateur` (`id_collaborateur`, `nom_collaborateur`, `prenom_collaborateur`, `naissance_collaborateur`, `societe_collaborateur`, `service_collaborateur`, `sexe_collaborateur`, `tel_collaborateur`, `adresse_collaborateur`, `cp_collaborateur`, `ville_collaborateur`, `mail_collaborateur`) VALUES 
('1', 'aze', 'aze', '0000-00-00', 'aze', 'aze', 'H', '', 'azeaze', '606', 'azeaez', 'aezaeaez@zea.fr'),
('2', 'aze', 'aze', '2014-04-10', 'aze', 'aze', 'H', '', 'azeaze', '606', 'azeaez', 'aezaeaez@zea.fr'),
('3', 'aze', 'aze', '0000-00-00', 'aze', 'aze', 'H', '', 'azeaze', '606', 'azeaez', 'aezaeaez@zea.fr'),
('4', 'j', 'j', '0000-00-00', 'j', 'j', 'H', 'j', 'j', '0', 'j', 'j@j.fr'),
('5', 'CIFFOTTI', 'Tony', '1990-08-12', 'Hexa', 'Techs', 'H', '0638657371', 'Le mollard', '1500', 'Ambronay', 'Tony.ciffotti@gmail.fr'),
('6', '+', '+', '2014-01-01', '+', '+', 'H', '+', '+', '0', '+', 'azeaz@aze.Fr'),
('7', '+', 'aze', '2013-02-01', 'aze', 'aze', 'H', '060606060', 'aee', '60606', 'azeaze', 'aezae@frf.fr'),
('8', 'aze', 'aze', '2011-02-02', 'aze', 'aze', 'H', '10101010', 'etert', '15161', 'zerzer', 'zerzer@zerzer.fr'),
('9', '8', 'aze', '2014-01-01', 'aze', 'aze', 'H', '0638657371', 'azeaze', '60606', 'azeaeza', 'aezaeaez@zea.fr'),
('10', '9', 'aze', '2014-01-01', 'aze', 'aze', 'H', '0638657371', 'azeaze', '60606', 'azeaeza', 'aezaeaez@zea.fr'),
('11', '-', 'aze', '2014-01-01', 'aze', 'aze', 'H', '0638657371', 'azeaze', '60606', 'azeaeza', 'aezaeaez@zea.fr'),
('12', '_', 'aze', '2014-01-01', 'aze', 'aze', 'H', '0638657371', 'azeaze', '60606', 'azeaeza', 'aezaeaez@zea.fr'),
('13', '1', 'aze', '2014-01-01', 'aze', 'aze', 'H', '0638657371', 'azeaze', '60606', 'azeaeza', 'aezaeaez@zea.fr');

--
-- Table structure: `competence`
--

CREATE TABLE `competence` (
  `id_competence` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant compétence',
  `lib_competence` varchar(200) NOT NULL COMMENT 'Libellé compétence',
  `descr_competence` text NOT NULL COMMENT 'Description compétence',
  `type_competence` char(1) NOT NULL COMMENT 'Type compétence',
  PRIMARY KEY (`id_competence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table compétence' ;

--
-- Table structure: `emploi`
--

CREATE TABLE `emploi` (
  `id_emploi` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant emploi',
  `lib_emploi` varchar(200) NOT NULL COMMENT 'Libellé emploi',
  `descr_emploi` text NOT NULL COMMENT 'Description emploi',
  PRIMARY KEY (`id_emploi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table emploi' ;

--
-- Table structure: `groupe`
--

CREATE TABLE `groupe` (
  `id_groupe` int(5) NOT NULL AUTO_INCREMENT,
  `lib_groupe` varchar(200) NOT NULL,
  PRIMARY KEY (`id_groupe`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ;

--
-- Table data: `groupe`
--
INSERT INTO `groupe` (`id_groupe`, `lib_groupe`) VALUES 
('1', 'admin'),
('2', 'rh'),
('3', 'visiteur');

--
-- Table structure: `lien_activite_competence`
--

CREATE TABLE `lien_activite_competence` (
  `id_actgen` int(5) NOT NULL COMMENT 'Identifiant activité générique (clé étrangère)',
  `id_actter` int(5) NOT NULL COMMENT 'Identifiant activité terrain (clé étrangère)',
  `id_competence` int(5) NOT NULL COMMENT 'Identifiant compétence (clé étrangère)',
  PRIMARY KEY (`id_actgen`,`id_actter`,`id_competence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre lien activité génériques/terrain et ' ;

--
-- Table structure: `lien_activite_generique_activite_terrain`
--

CREATE TABLE `lien_activite_generique_activite_terrain` (
  `id_actgen` int(5) NOT NULL COMMENT 'Identifiant activité générique (clé étrangère)',
  `id_actter` int(5) NOT NULL COMMENT 'Identifiant activité terrain (clé étrangère)',
  PRIMARY KEY (`id_actgen`,`id_actter`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre activité générique et activité terra' ;

--
-- Table structure: `lien_competence_portefeuille`
--

CREATE TABLE `lien_competence_portefeuille` (
  `id_competence` int(200) NOT NULL COMMENT 'Identifiant competence',
  `id_portefeuille` int(200) NOT NULL COMMENT 'Identifiant portefeuille',
  PRIMARY KEY (`id_competence`,`id_portefeuille`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre compétence et portefeuille' ;

--
-- Table structure: `lien_emploi_activite_generique`
--

CREATE TABLE `lien_emploi_activite_generique` (
  `id_emploi` varchar(5) NOT NULL COMMENT 'Identifiant emploi',
  `id_actgen` varchar(5) NOT NULL COMMENT 'Identifiant activité générique',
  PRIMARY KEY (`id_emploi`,`id_actgen`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre "emploi" et "Activite_generique"' ;

--
-- Table structure: `lien_emploi_portefeuille`
--

CREATE TABLE `lien_emploi_portefeuille` (
  `id_emploi` int(5) NOT NULL COMMENT 'Identifiant emploi (clé étrangère)',
  `id_portefeuille` int(5) NOT NULL COMMENT 'Identifiant portefeuille (clé étrangère)',
  PRIMARY KEY (`id_emploi`,`id_portefeuille`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation en emploi et portefeuille' ;

--
-- Table structure: `lien_emploi_profil_poste`
--

CREATE TABLE `lien_emploi_profil_poste` (
  `id_emploi` int(5) NOT NULL COMMENT 'Identifiant emploi (clé étrangère)',
  `id_profil_poste` int(5) NOT NULL COMMENT 'Identifiant profil de poste (clé étrangère)',
  PRIMARY KEY (`id_emploi`,`id_profil_poste`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre "Emploi" et "Profil_poste"' ;

--
-- Table structure: `lien_portefeuille_collaborateur`
--

CREATE TABLE `lien_portefeuille_collaborateur` (
  `id_portefeuille` int(5) NOT NULL COMMENT 'Identifiant portefeuille (clé étrangère)',
  `id_collaborateur` int(5) NOT NULL COMMENT 'Identifiant collaborateur (clé étrangère)',
  PRIMARY KEY (`id_portefeuille`,`id_collaborateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre portefeuille et collaborateur' ;

--
-- Table structure: `lien_poste_activite_terrain`
--

CREATE TABLE `lien_poste_activite_terrain` (
  `id_poste` int(5) NOT NULL COMMENT 'Identifiant poste (clé étrangère)',
  `id_actter` int(5) NOT NULL COMMENT 'Identifiant activité terrain (clé étrangère)',
  PRIMARY KEY (`id_poste`,`id_actter`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre poste et Activité terrain' ;

--
-- Table structure: `lien_poste_profil_poste`
--

CREATE TABLE `lien_poste_profil_poste` (
  `id_profil_poste` int(5) NOT NULL COMMENT 'Identifiant clé primaire table "Profil_poste"',
  `id_poste` int(5) NOT NULL COMMENT 'Identifiant clé primaire table "Poste"',
  PRIMARY KEY (`id_profil_poste`,`id_poste`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre "Profil_poste" et "Poste"' ;

--
-- Table structure: `lien_profil_poste_activite_terrain`
--

CREATE TABLE `lien_profil_poste_activite_terrain` (
  `id_pp` int(5) NOT NULL COMMENT 'Identifiant profil de poste (clé étrangère)',
  `id_actter` int(5) NOT NULL COMMENT 'Identifiant activité terrain (clé étrangère)',
  PRIMARY KEY (`id_pp`,`id_actter`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre activité générique et ' ;

--
-- Table structure: `portefeuille`
--

CREATE TABLE `portefeuille` (
  `id_portefeuille` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant portefeuille',
  `lib_portefeuille` varchar(200) NOT NULL COMMENT 'Libellé portefeuille',
  PRIMARY KEY (`id_portefeuille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table portefeuille' ;

--
-- Table structure: `poste`
--

CREATE TABLE `poste` (
  `id_poste` int(5) NOT NULL AUTO_INCREMENT,
  `lib_poste` varchar(200) NOT NULL,
  `descr_poste` text NOT NULL,
  `occup_poste` char(1) NOT NULL,
  PRIMARY KEY (`id_poste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

--
-- Table structure: `profil_poste`
--

CREATE TABLE `profil_poste` (
  `id_profil_poste` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant profil de poste',
  `lib_profil_poste` varchar(200) NOT NULL COMMENT 'Libellé profil de poste',
  PRIMARY KEY (`id_profil_poste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table profil de poste' ;

--
-- Table structure: `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_groupe` int(5) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ;

--
-- Table data: `user`
--
INSERT INTO `user` (`id_user`, `login`, `password`, `id_groupe`) VALUES 
('1', 'test', 'test', '0'),
('2', 'tset2', 'tet2', '0'),
('3', 'test', 'test', '1'),
('4', 'tset2', 'tet2', '1');