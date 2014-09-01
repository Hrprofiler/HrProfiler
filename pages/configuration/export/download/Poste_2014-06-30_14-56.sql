-- SQL Dump
	--
	-- Generation: Mon, 30 Jun 2014 14:56:14 +0200
	-- MySQL version: 5.1.73-1.1+squeeze+build0+1-log
	-- PHP version: 5.4.29

	SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

	--
	-- Database: `hrprofil_bdd`
	--

--
-- Table structure: `Poste`
--

CREATE TABLE `Poste` (
  `id_poste` int(5) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `occuper` char(1) NOT NULL,
  PRIMARY KEY (`id_poste`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 ;

--
-- Table data: `Poste`
--
INSERT INTO `Poste` (`id_poste`, `libelle`, `description`, `occuper`) VALUES 
('64', 'Secrétaire du service comptable', 'Gère les données comptables', '1'),
('66', 'Contrôleur technique automobile', 'Effectue les contrôle techniques', '0'),
('69', 'Agent du gardiennage du gymnase municipal', 'Controle du bon fonctionnement des equipements sportifs, Effectue des rondes de surveillances', '0'),
('71', 'Installateur d\'equipement electrique pour les particuliers', 'Effectue des operations d\'installation et de raccordement electrique chez les particuliers\r\n\r\n\r\n', '0'),
('72', 'Chef de projet informatique développement web', 'Supervise le déroulement du projet', '1'),
('74', 'Conducteur véhicules agricoles', 'Conduit et entretien les véhicules agricoles', '1'),
('76', 'Technicien d\'entretien du parc municipal', 'Entretien des pelouse (tonte, arrosage, plantation)', '0'),
('77', 'Chef de chantier batiment', 'Charge de l\'organisation et du deroulement des travaux', '1'),
('78', 'Agent de transit de marchanise', 'Effectue les demarches administratives concernant l\'expediation et la livraison des marchandises', '1'),
('80', 'Anesthesiste', 'Charge d\'effectuer l\'anesthesie generale ou locale et surveille les signes vitaux du patient', '1'),
('82', 'Technicien camion', 'Entretien des camions', '1');