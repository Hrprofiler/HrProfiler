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