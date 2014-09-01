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

//récupération des POST dans le tableau "liste_table"
	$liste_table['Collaborateur'] = $_POST['collaborateur'];
	$liste_table['Emploi'] = $_POST['emploi'];
	$liste_table['Poste'] = $_POST['poste'];
	$liste_table['Profil_poste'] = $_POST['profil_poste'];
	$liste_table['Competence'] = $_POST['competence'];
	$liste_table['Activite_generique'] = $_POST['activite_generique'];
	$liste_table['Activite_terrain'] = $_POST['activite_terrain'];
	$liste_table['Utilisateur'] = $_POST['utilisateur'];
	$liste_table['Groupe'] = $_POST['groupe'];
//récupération du Type
	$type = $_POST['type_export_list'];
	
//creer verification min 1 bouton (CSV/SQL) coché
	
	foreach ($liste_table as $key => $table) {
		if ($table != 'Yes') {
			$table = 'No';
		}
	}	
	//Initialisation de l'archive ZIP
	$zip = new ZipArchive(); 
	$filename = 'download/export_'.date('H-i-s').'_'.date('d-m-Y').'.zip';
	
	if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
		exit("Impossible d'ouvrir le fichier zip\n");
	}
	
		if ($type == 'CSV') {
			echo '<div id="resultat" class="container">';
			foreach ($liste_table as $key => $table) {
				if ($table == 'Yes') {
					include 'traitement_export_liste_csv.php';
					 $zip->addFile($namefile);
				}
			}
			//echo '</div>';
		}
		elseif ($type == 'SQL') {
			echo '<div id="resultat" class="container">';
			foreach ($liste_table as $key => $table) {
				if ($table == 'Yes') {
					include 'traitement_export_liste_sql.php';
					$zip->addFile($dumpfile);
				}
			}
			// echo '</div>';
		}
	//Fermeture de l'archive .ZIP
	$zip->close();
	
	// echo 'Format d\'export : '.$type.'<br>';
	
?>
<br /><a href="<?php echo $filename; ?>"><button class="btn btn-success btn-small">Télécharger <i class="icon-white icon-file"></i></button></a>
<a href="http://hr-profiler.fr/pages/p_import_export.php"><button class="btn btn-success btn-small">Acceuil <i class="icon-white icon-home"></i></button></a>
</div>