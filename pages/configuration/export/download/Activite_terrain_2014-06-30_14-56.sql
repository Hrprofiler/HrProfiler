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
-- Table structure: `Activite_terrain`
--

CREATE TABLE `Activite_terrain` (
  `id_actter` int(5) NOT NULL AUTO_INCREMENT,
  `lib_actter` varchar(200) NOT NULL,
  `descr_actter` text NOT NULL,
  PRIMARY KEY (`id_actter`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='Table activit� terrain' ;

--
-- Table data: `Activite_terrain`
--
INSERT INTO `Activite_terrain` (`id_actter`, `lib_actter`, `descr_actter`) VALUES 
('3', 'Jardinier ', 'Mise en place, d\'amenagement et d\'entretient des espaces verts \r\n\r\nPrepare des sols en retournant la terre, apporte les engrais necessaires. \r\n \r\nMise en place des plantations de vegetaux \r\n \r\n\r\n\r\n'),
('6', 'Mecanicien automobile', 'Il examine  le vehicule pour trouver la panne. Cette phase lui permet d\'emettre une hypothese sur l\'origine de la panne. A l\'aide du materiel d\'aide au diagnostic, il realise des tests sur les elements mecaniques, electriques ou electroniques.\r\n\r\nIl interprete les differents resultats, identifie l\'origine de la defaillance, fait le bilan des reparations a executer. En cas de probleme serieux, il soumet au client un devis. Une fois le diagnostic etabli, il approvisionne son poste de travail en pieces detachees, demonte les organes defectueux, remplace ou remet en etat les pieces endommagees. Puis il effectue les differents reglages en suivant les recommandations du constructeur.\r\n\r\n\r\n\r\n'),
('8', 'Infirmier anesthesiste', 'Il dispense des soins d\'anesthesie, de reanimation et de traitement de la douleur. \r\n\r\nIl travaille en etroite collaboration et sous la responsabilite d\'un medecin anesthesiste au bloc operatoire, en salle de surveillance post-interventionnelle\r\n\r\n'),
('13', 'chef de projet informatique', 'Il supervise la conception de la solution informatique la plus adaptee au client. Pour cela, il assiste les utilisateurs dans la definition de leurs besoins, puis il elabore un cahier des charges. Il estime le temps de travail et le budget necessaires, etablit les plannings, evalue les risques et les enjeux. Il peut decider de sous-traiter une partie ou la totalite de la realisation.\r\n\r\nEn tant que coordinateur, il controle la qualite des developpements, veille au respect des delais et des couts. Il communique le compte-rendu operatoire, a sa hierarchie comme a son client. Son imperatif : boucler le projet en temps et en heure, en repondant au mieux au budget et aux attentes exprimees.\r\n\r\nIl participe aussi a la mise en place des solutions informatiques et a leur integration dans l\'entreprise. A lui d\'apporter des ameliorations si necessaire. La maintenance et l\'evolution des applications relevent parfois de ses missions.'),
('14', 'Electricien installateur', 'Il etudit les plans et les schemas qui lui sont utiles pour la pose des cables. Il repere ensuite sur le chantier le futur emplacement des disjoncteurs, tableaux ou armoires electriques. Il verifie enfin qu\'il dispose bien des fournitures et outillages necessaire a l\'installation.\r\n\r\nDe plus, il installe les canalisations et les supports, pose le reseau de cables, il implante les divers materiels: interrupteurs, prises de courant, appareils de chauffage et effectuer les raccordements necessaires.\r\n\r\nUne fois ces travaux acheves, il procede a une serie de tests pour verifier que l\'installation est bien conforme aux plans et schemas fournis des le depart. Il participe a la mise en service en presence du client et du chef de chantier.\r\n\r\n'),
('15', 'Agent de transit', 'Etablit les papiers necessaires a l\'import-export de marchandises : les documents d\'expedition. Il redige aussi bien une declaration de douane qu\'une attestation pour transporter des matieres dangereuses ou des certificats sanitaires.\r\nIl affrete les produits pour le moindre cout et dans les meilleurs delais. Il choisit le moyen de transport adequat (route, air, mer, fer) et negocie avec les transporteurs (dates et lieux de livraison, chargement et dechargement) jusqu\'au lieu de livraison.'),
('16', 'Gardien de gymnase', 'Il surveille les installations d\'un complexe sportif, le fonctionnement des equipements sportifs, controle de la fermeture des batiment, de l\'extinction des lumieres, test des alarmes du batiment\r\nEntretien courant des installation l\'electrique.\r\n\r\n'),
('17', 'Secretaire comptable', 'A la direction financiere, il est charge du suivi du livre comptable,d\'enregistrer les donnees fiscales et financieres, d\'editer les feuilles de paie, de gerer les relations avec les fournisseurs et les clients ou encore de surveiller les frais generaux, les recouvrements de creance'),
('18', 'Chef de chantier', 'Participe aux reunions preparatoires avec les conducteurs de travaux et les ingenieurs d\'etudes,il prend connaissance des plans et du dossier technique. Il s\'assure sur le terrain que les contraintes et obstacles ont ete geres. Il veille aussi a l\'approvisionnement en materiels, outillages et materiaux, examine le planning prevu et repartit les taches entre les differents ouvriers. Il doit egalement verifier la securite, du delai et de la qualite. Il expose les avancees et les difficultes rencontrees. '),
('19', 'Technicien agricole', 'Participe aux travaux agricole. Il prend alors soin des cultures, nourrit les animaux, entretient le materiel et les locaux, gere le stock.\r\n\r\nIl peut egalement etre conducteur de machines agricoles ou encore technicien en aquaculture et travailler dans des elevages d\'animaux et de plantes.'),
('20', 'Mecanicien véhicule industriels', 'Entretien des poids lourds'),
('21', 'Secrétaire accueil', 'Accueil des visiteurs'),
('22', 'Infirmier chiurgien', 'Opère les patients en bloc opératoire');