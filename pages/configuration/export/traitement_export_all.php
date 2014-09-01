<?php
	include '../../../includes/header.php';
	include '../../../includes/fonctions.php';
?>
<head>
	<link rel="stylesheet" href="import-export.css" />
	<title>HR-Profiler - Import/Export</title>
</head>
<?php

$bdd = new PDO('mysql:host=mysql51-120.perso; dbname=hrprofil_bdd','hrprofil_bdd','eSkf9fN2hgaB');

//Déclaration des tables dans un tableau
	$liste_table['Collaborateur'] = 'OK';
	$liste_table['Emploi'] = 'OK';
	$liste_table['Poste'] = 'OK';
	$liste_table['Profil_poste'] = 'OK';
	$liste_table['Competence'] = 'OK';
	$liste_table['Activite_generique'] = 'OK';
	$liste_table['Activite_terrain'] = 'OK';
	$liste_table['Utilisateur'] = 'OK';
	$liste_table['Groupe'] = 'OK';

//récupération du Type
	$type = $_POST['type_export_all'];

//creer verification min 1 bouton (CSV/SQL) coché
	
echo '<div id="resultat" class="container">';
	if ($type == 'temp') {
		echo '<img src="../../../images/nok.png" /> Merci de selectionner un format d\'export (SQL ou CSV) <br /><br />';
		echo '<a href="http://hr-profiler.fr/pages/p_import_export.php"><button class="btn btn-success btn-small">Revenir sur la page d\'import/export <i class="icon-white icon-home"></i></button></a>';
	}
	elseif ($type == 'SQL') {
		include 'traitement_export_all_sql.php';
	}
	elseif ($type == 'CSV') {
		//Initialisation de l'archive ZIP
		$zip = new ZipArchive(); 
		$filename = 'download/export_'.date('H-i-s').'_'.date('d-m-Y').'.zip';
		if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
			exit("Impossible d'ouvrir le fichier zip\n");
		}
		
		foreach ($liste_table as $key => $table) {
			include 'traitement_export_all_csv.php';
			$zip->addFile($namefile);
		}
		echo '<br /><a href="'.$filename.'"><button class="btn btn-success btn-small">Télécharger <i class="icon-white icon-file"></i></button></a>
			  <a href="http://hr-profiler.fr/pages/p_import_export.php"><button class="btn btn-success btn-small">Acceuil <i class="icon-white icon-home"></i></button></a>';
		//Fermeture de l'archive .ZIP
		$zip->close();
	}
echo '</div>';	
?>