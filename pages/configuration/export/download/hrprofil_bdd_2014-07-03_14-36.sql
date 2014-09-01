-- SQL Dump
--
-- Generation: Thu, 03 Jul 2014 14:36:55 +0200
-- MySQL version: 5.1.73-1.1+squeeze+build0+1-log
-- PHP version: 5.4.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `hrprofil_bdd`
--

--
-- Table structure: `Activite_generique`
--

CREATE TABLE `Activite_generique` (
  `id_actgen` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant activité générique',
  `lib_actgen` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT 'Libellé activité générique',
  `descr_actgen` text CHARACTER SET utf8 NOT NULL COMMENT 'Description activité générique',
  PRIMARY KEY (`id_actgen`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table activité générique' ;

--
-- Table data: `Activite_generique`
--
INSERT INTO `Activite_generique` (`id_actgen`, `lib_actgen`, `descr_actgen`) VALUES 
('8', 'Gardien', 'Assure la surveillance des locaux'),
('9', 'MÃ©canicien ', 'Assurer la maintenance et la reparation de vehicules routiers'),
('10', 'Electrotechnicien', 'Controle les equipements electronique.'),
('11', 'Horticulteur', 'Assurer le developpement des vegetaux.'),
('13', 'Informaticien', 'Concoit des applications ou des sites web'),
('14', 'Secretaire', 'Gere la communication '),
('20', 'Ouvrier Genie Civil', 'ProcÃ¨de Ã  la construction de tous ouvrages et bÃ¢timents.'),
('21', 'Infirmier', ' Professionnel de santÃ©, dont la profession est de dÃ©livrer des soins infirmiers'),
('22', 'Agriculteur', 'procÃ¨de Ã  la mise en culture de la terre'),
('23', 'Logisticien', 'SpÃ©cialiste ou professionnel de la logistique'),
('25', 'Formateur professionel', 'Forme Ã  des metiers');

--
-- Table structure: `Activite_terrain`
--

CREATE TABLE `Activite_terrain` (
  `id_actter` int(5) NOT NULL AUTO_INCREMENT,
  `lib_actter` varchar(200) NOT NULL,
  `descr_actter` text NOT NULL,
  PRIMARY KEY (`id_actter`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='Table activité terrain' ;

--
-- Table data: `Activite_terrain`
--
INSERT INTO `Activite_terrain` (`id_actter`, `lib_actter`, `descr_actter`) VALUES 
('3', 'Jardinier ', 'AmÃ©nage les espaces verts'),
('6', 'Mecanicien automobile', 'Examine les vÃ©hicules afin de trouver des pannes'),
('14', 'Electricien installateur', 'Etudie les plans et les schemas.'),
('17', 'Secretaire comptable', 'ChargÃ© du suivi du livre comptable.'),
('18', 'Chef de chantier', 'Repartit les tÃ¢ches entre les ouvriers'),
('19', 'Technicien agricole', 'Participe aux travaux agricole.'),
('20', 'Mecanicien vÃ©hicule industriels', 'Entretien des poids lourds'),
('21', 'SecrÃ©taire accueil', 'Accueil des visiteurs'),
('22', 'Infirmier chiurgien', 'OpÃ¨re les patients en bloc opÃ©ratoire'),
('23', 'Chef de Projet Informatique', 'Supervise la conception de la solution informatique la plus adaptee au clien'),
('24', 'Gardien de gymnase', 'Surveille les installations sportives'),
('25', 'Agent de transit', 'Etablit les papiers necessaires');

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
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COMMENT='Table collaborateurs' ;

--
-- Table data: `Collaborateur`
--
INSERT INTO `Collaborateur` (`id_collaborateur`, `nom_collaborateur`, `prenom_collaborateur`, `naissance_collaborateur`, `societe_collaborateur`, `service_collaborateur`, `sexe_collaborateur`, `tel_collaborateur`, `adresse_collaborateur`, `cp_collaborateur`, `ville_collaborateur`, `mail_collaborateur`) VALUES 
('71', 'Martin', 'Pierre', '1970-01-10', 'EDF', 'Technique', 'Homme', '0410458799', '10 Cours Lafayette', '69003', 'Lyon', 'martin.pierre@outlook. com'),
('72', 'Pariseau', 'Pascal', '1985-01-12', 'Gynmase municipal', 'Technique', 'Homme', '04.75.87.14.72', '24, rue Victor Hugo', '91100', 'Corbeil-Essones', 'Pascal.Pariseau@orange.com'),
('73', 'BÃ©land', 'Claire', '0000-00-00', 'Adecco', 'ComptabilitÃ©', 'Femme', '04.77.87.21.33', '56, Avenue De Marlioz', '74100', 'Annemasse', 'Claire.BÃ©land@yahoo.com'),
('74', 'Martineau', 'Romain', '1989-10-15', 'Gefco ', 'Logistique', 'Homme', ' 01.87.43.92.71', '57, rue Victor Hugo', '78700', 'Conflans-Saintes-Honorine', ' RomainMartineau@gmail.com'),
('75', 'Barros-Oliveira', 'Vitor ', '1980-05-14', 'Vinci', 'Travaux publics', 'Homme', '02.29.78.81.30', '83, rue Victor Hugo', '29900', 'Concarneau', 'Barros.Oliveira@outlook.com'),
('76', 'Durand', 'Jacques', '1965-01-14', 'Centre hospitalier', 'AnestÃ©sie', 'Homme', ' 02.25.68.04.63', '60, avenue du Marechal Juin', '97450', 'Saint-Louis', 'durand.jacques@free.fr'),
('77', 'Rivard', 'GÃ©rard', '1955-07-05', 'Renault', 'MÃ©canique', 'Homme', '02.44.30.27.20', '75, route de Lyon', '37300', 'JouÃ©-Les-Tours', 'gerard.rivard@gmail.com'),
('78', 'Dupont', 'Jean', '1964-02-15', 'Cap Gemini', 'Developpement', 'Homme', ' 01.69.85.07.20', '58, rue Saint Germain', '93220', 'Gagny', 'dupont.jean@orange.fr'),
('79', 'Saindon', 'Eloise', '0000-00-00', 'MunicipalitÃ©', 'Entretien', 'Femme', ' 04.71.94.22.24', '45, Avenue des Pres', '3100', 'MontluÃ§on', ' Eloise.Saindon@orange.com'),
('80', 'CarriÃ¨re', 'Marcel', '0000-00-00', 'Cooperative agricole', 'Agricole', 'Homme', ' 05.29.33.46.07', '65, rue du Gue Jacquet', '86100', 'ChÃ¢tellerault', 'marcel.carrire@gmail.com');

--
-- Table structure: `Competence`
--

CREATE TABLE `Competence` (
  `id_competence` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant compétence',
  `lib_competence` varchar(200) NOT NULL COMMENT 'Libellé compétence',
  `descr_competence` text NOT NULL COMMENT 'Description compétence',
  `type_competence` varchar(255) NOT NULL COMMENT 'Type compétence',
  PRIMARY KEY (`id_competence`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8 COMMENT='Table compétence' ;

--
-- Table data: `Competence`
--
INSERT INTO `Competence` (`id_competence`, `lib_competence`, `descr_competence`, `type_competence`) VALUES 
('211', 'Reparation de moteur diesel', 'Connaissances des moteurs diesel', 'CompÃ©tence'),
('212', 'Controleur salles opÃ©rations', 'Verifier les locaux mÃ©dicaux', 'CompÃ©tence'),
('213', 'Tracabilite des produits', 'ConnaÃ®tre la gestion de produits', 'Savoir-faire'),
('214', 'Administratives des transports', 'Connaitre les reglementations', 'CompÃ©tence'),
('215', 'Maquetter une application web', 'Connaissance en webdesign', 'Savoir-faire'),
('216', 'Accueil de la clientÃ¨le', 'Accueillir les clients et les renseigner', 'Savoir-faire'),
('217', 'Suivre un chantier', 'Savoir gÃ©rer un chantier', 'Savoir-faire'),
('218', 'Tailler les vegetaux', 'Savoir utiliser des outils pour Ã©laguer', 'CompÃ©tence'),
('219', 'Raccordement Ã©lÃ©ctrique', 'Savoir lire un schÃ©ma Ã©lÃ©ctrique', 'CompÃ©tence'),
('220', 'Entretien des Ã©quipements', 'Reparer les Ã©quipements defectueux', 'CompÃ©tence');

--
-- Table structure: `Emploi`
--

CREATE TABLE `Emploi` (
  `id_emploi` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant emploi',
  `lib_emploi` varchar(200) NOT NULL COMMENT 'Libellé emploi',
  `descr_emploi` text NOT NULL COMMENT 'Description emploi',
  PRIMARY KEY (`id_emploi`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='Table emploi' ;

--
-- Table data: `Emploi`
--
INSERT INTO `Emploi` (`id_emploi`, `lib_emploi`, `descr_emploi`) VALUES 
('19', 'Electricien', 'Installation et maintenance des installations Ã©lectrique'),
('20', 'SecrÃ©taire ', 'GÃ¨re les dossiers professionels, les appels tÃ©lÃ©phoniques et l\'accueil des visiteurs'),
('21', 'Gardien de gymnase', 'Surveille l\'etat des locaux et equipements sportifs'),
('22', 'MÃ©canicien', 'Assure la rÃ©paration des vÃ©hicules'),
('23', 'Infirmier', 'Assure des soins mÃ©dicaux au patient'),
('24', 'IngÃ©nieur informatique', 'Supervise des projets '),
('25', 'Jardinier', 'Entretien les espaces verts'),
('26', 'Agriculteur', 'ProcÃ¨de Ã  la culture de vÃ©gÃ©taux'),
('27', 'Logisticien', 'Supervise les flux de marchandises et de personnes'),
('28', 'Ingenieur Genie Civil', 'Supervise le deroulement d\'un chantier');

--
-- Table structure: `Groupe`
--

CREATE TABLE `Groupe` (
  `id_groupe` int(5) NOT NULL AUTO_INCREMENT,
  `lib_groupe` varchar(200) NOT NULL,
  PRIMARY KEY (`id_groupe`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 ;

--
-- Table data: `Groupe`
--
INSERT INTO `Groupe` (`id_groupe`, `lib_groupe`) VALUES 
('1', 'Administrateur'),
('2', 'Ressources Humaines'),
('3', 'Visiteur');

--
-- Table structure: `Liaisons`
--

CREATE TABLE `Liaisons` (
  `Table1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Table_liee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Table_liaison` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Champ` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Champ_lie` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

--
-- Table data: `Liaisons`
--
INSERT INTO `Liaisons` (`Table1`, `Table_liee`, `Table_liaison`, `Champ`, `Champ_lie`) VALUES 
('Activite_generique', 'Competence', 'Lien_activite_Competence', 'id_actgen', 'id_competence'),
('Activite_generique', 'Activite_terrain', 'Lien_activite_generique_Activite_terrain', 'id_actgen', 'id_actter'),
('Activite_terrain', 'Poste', 'Lien_poste_Activite_terrain', 'id_actter', 'id_poste'),
('Activite_terrain', 'Competence', 'Lien_activite_Competence', 'id_actter', 'id_competence'),
('Activite_terrain', 'Profil_poste', 'Lien_profil_poste_Activite_terrain', 'id_actter', 'id_profil_poste'),
('Collaborateur', 'Portefeuille', 'Lien_portefeuille_Collaborateur', 'id_collaborateur', 'id_portefeuille'),
('Competence', 'Portefeuille', 'Lien_competence_portefeuille', 'id_competence', 'id_portefeuille'),
('Emploi', 'Activite_generique', 'Lien_emploi_Activite_generique', 'id_emploi', 'id_actgen'),
('Emploi', 'Portefeuille', 'Lien_emploi_Portefeuille', 'id_emploi', 'id_portefeuille'),
('Emploi', 'Profil_poste', 'Lien_emploi_Profil_poste', 'id_emploi', 'id_profil_poste'),
('Poste', 'Profil_poste', 'Lien_poste_Profil_poste', 'id_poste', 'id_profil_poste');

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
('0', '3', '218'),
('8', '0', '212'),
('9', '0', '215'),
('9', '6', '211'),
('10', '5', '4'),
('11', '0', '218'),
('11', '16', '220'),
('13', '13', '215'),
('14', '17', '216'),
('20', '18', '217'),
('21', '8', '212'),
('22', '19', '213'),
('23', '15', '214');

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
('8', '0'),
('8', '16'),
('9', '6'),
('11', '3'),
('13', '13'),
('14', '17'),
('20', '18'),
('21', '8'),
('22', '19'),
('23', '15');

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
('211', '19'),
('212', '22'),
('213', '26'),
('214', '25'),
('215', '18'),
('216', '21'),
('217', '24'),
('218', '27'),
('219', '24'),
('220', '23');

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
('', ''),
('20', '14'),
('21', '8'),
('22', '9'),
('23', '21'),
('24', '13'),
('25', '11'),
('26', '22'),
('27', '23'),
('28', '20');

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
('19', '24'),
('20', '21'),
('21', '23'),
('22', '19'),
('23', '22'),
('24', '18'),
('25', '20'),
('26', '26'),
('27', '25'),
('28', '27');

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
('7', '50'),
('19', '51'),
('19', '53'),
('20', '50'),
('20', '51'),
('20', '60'),
('21', '54'),
('22', '53'),
('23', '58'),
('24', '55'),
('25', '59'),
('26', '56'),
('27', '57'),
('28', '52');

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
('18', '0'),
('18', '78'),
('19', '77'),
('20', '79'),
('21', '73'),
('22', '76'),
('23', '72'),
('24', '71'),
('25', '74'),
('26', '80'),
('27', '75');

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
('0', '3'),
('0', '6'),
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
('60', '3'),
('64', '6'),
('64', '8'),
('66', '6'),
('66', '8'),
('66', '14'),
('84', '3');

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
('5', '59'),
('6', '58'),
('7', '57'),
('8', '56'),
('9', '55'),
('10', '54'),
('11', '53'),
('12', '52'),
('13', '21'),
('50', '0'),
('50', '51'),
('50', '52'),
('50', '64'),
('51', '0'),
('51', '64'),
('51', '71'),
('51', '72'),
('52', '77'),
('53', '22'),
('53', '60'),
('53', '66'),
('54', '69'),
('55', '0'),
('55', '72'),
('56', '74'),
('57', '78'),
('58', '80'),
('59', '76'),
('59', '84'),
('60', '64'),
('61', '66');

--
-- Table structure: `Lien_profil_poste_Activite_terrain`
--

CREATE TABLE `Lien_profil_poste_Activite_terrain` (
  `id_profil_poste` int(5) NOT NULL COMMENT 'Identifiant profil de poste (clé étrangère)',
  `id_actter` int(5) NOT NULL COMMENT 'Identifiant activité terrain (clé étrangère)',
  PRIMARY KEY (`id_profil_poste`,`id_actter`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table de relation entre activité générique et ' ;

--
-- Table data: `Lien_profil_poste_Activite_terrain`
--
INSERT INTO `Lien_profil_poste_Activite_terrain` (`id_profil_poste`, `id_actter`) VALUES 
('50', '3'),
('51', '14'),
('52', '18'),
('53', '6'),
('54', '16'),
('55', '13'),
('56', '19'),
('57', '15'),
('58', '8'),
('59', '3'),
('60', '17');

--
-- Table structure: `Portefeuille`
--

CREATE TABLE `Portefeuille` (
  `id_portefeuille` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant portefeuille',
  `lib_portefeuille` varchar(200) NOT NULL COMMENT 'Libellé portefeuille',
  PRIMARY KEY (`id_portefeuille`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='Table portefeuille' ;

--
-- Table data: `Portefeuille`
--
INSERT INTO `Portefeuille` (`id_portefeuille`, `lib_portefeuille`) VALUES 
('18', 'Supervision de projet en developpement logiciel'),
('19', 'Diagnostics mÃ©caniques'),
('20', 'Entretien des espaces verts'),
('21', 'PrÃ©paration et suivie des dossiers professionnels.'),
('22', 'VÃ©rification du bon fonctionnement du matÃ©riel mÃ©dical'),
('23', 'Controler l\'etat des equipements des locaux'),
('24', 'Localiser et diagnostiquer une panne Ã©lectrique'),
('25', 'Constituer des dossiers et documentation'),
('26', 'Verifier le contenu des registres de suivi des animaux et des produits'),
('27', 'Presentation du chantier, creation d\'un planning, et definition des techniques de constructions'),
('28', 'Carrossier'),
('29', 'Maitrise informatique');

--
-- Table structure: `Poste`
--

CREATE TABLE `Poste` (
  `id_poste` int(5) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `occuper` char(1) NOT NULL,
  PRIMARY KEY (`id_poste`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 ;

--
-- Table data: `Poste`
--
INSERT INTO `Poste` (`id_poste`, `libelle`, `description`, `occuper`) VALUES 
('64', 'SecrÃ©taire du service comptable', 'GÃ¨re les donnÃ©es comptables', '1'),
('66', 'ContrÃ´leur technique automobile', 'Effectue les contrÃ´le techniques', '0'),
('72', 'Chef de projet informatique dÃ©veloppement web', 'Supervise le dÃ©roulement du projet', '1'),
('74', 'Conducteur vÃ©hicules agricoles', 'Conduit et entretien les vÃ©hicules agricoles', '1'),
('76', 'Technicien d\'entretien du parc municipal', 'Entretien des pelouse (tonte, arrosage, plantation)', '0'),
('77', 'Chef de chantier batiment', 'Charge de l\'organisation et du deroulement des travaux', '1'),
('82', 'Technicien camion', 'Entretien des camions', '1'),
('84', 'Jardinier du Parc de Lyon', 'Jardinier', '0'),
('85', 'Agent de transit de marchanise', '	Effectue les demarches administratives', '0'),
('86', 'Agent du gardiennage du gymnase municipal', 'Controle du bon fonctionnement des equipements.', '0'),
('87', 'Installateur', 'Reccorde les installations', '0');

--
-- Table structure: `Profil_poste`
--

CREATE TABLE `Profil_poste` (
  `id_profil_poste` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant profil de poste',
  `lib_profil_poste` varchar(200) NOT NULL COMMENT 'Libellé profil de poste',
  PRIMARY KEY (`id_profil_poste`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COMMENT='Table profil de poste' ;

--
-- Table data: `Profil_poste`
--
INSERT INTO `Profil_poste` (`id_profil_poste`, `lib_profil_poste`) VALUES 
('50', 'Permanent accueil'),
('51', 'Electricien de batiment'),
('52', 'Ouvrier genie civil'),
('53', 'mÃ©canicien vehicule leger'),
('54', 'Gardien de gymnase'),
('55', 'Ingenieur developpeur'),
('56', 'Technicien agricole'),
('57', 'Agent logisticien'),
('58', 'Infirmier chirurgien'),
('59', 'Jardinier municipal'),
('60', 'Secretaire '),
('61', 'mecanicien poids lourds');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 ;

--
-- Table data: `Utilisateur`
--
INSERT INTO `Utilisateur` (`id_user`, `login_user`, `pass_user`, `nom_user`, `prenom_user`, `mail_user`, `id_groupe`) VALUES 
('11', 'lolo', 'a7ca81c17d0ab3e5c2d7dbe755b30aea799d7b1e', 'M', 'lolo', 'lolo@lolilol.fr', '0'),
('12', 'tony', 'f8b242668373d6e0bd21738098af6d126c5ad200', 'C', 'T', 'tonytruant@hr-profiler.com', '0'),
('15', 'b.boissin', '570c0737f1f0760d35ad7a15ece93ab0c3436f46', 'Boissin', 'Benjamin', 'boissin.b@hr-p.fr', '3'),
('17', 'Admin', '7422ed07c3d90806f52e2a76846b300f5c1db2a6', 'Administrateur', 'admin', 'admin@hr-p.fr', '1'),
('18', 'dsfsdf', 'ea1d23249e5b15bef4a16b8e89d81ba47a156b8a', 'sdfsdf', 'sdfsdf', 'sdsdfsdfsdf', '1');