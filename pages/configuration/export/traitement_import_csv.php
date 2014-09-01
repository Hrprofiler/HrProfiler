<?php

$table = $_POST['table'];

switch ($table)
{ 
    case 'Groupe': 
        $clne=2;
    break;
	
	 case 'Collaborateur': 
        $clne=12;
    break;
	
	 case 'Activite_generique': 
        $clne=3;
    break;
	
	 case 'Activite_terrain':
        $clne=3;
    break;
	
	 case 'Competence': 
        $clne=4;
    break;
	
	 case 'Emploi': 
        $clne=3;
    break;
	
	 case 'Portefeuille': 
        $clne=2;
    break;
	
	 case 'Poste':
        $clne=4;
    break;
	
	case 'Profil_poste':
        $clne=2;
    break;
    
    default:
        //echo "Oups !";
}

$extensions_valides = array( 'csv' );
//1. strrchr renvoie l'extension avec le point (� . �).
//2. substr(chaine,1) ignore le premier caract�re de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['fichier']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) 
{

	if(isset($_FILES['fichier']))
		{ 
			 $dossier = 'upload/';
			 //$fichier = 'upload_table_'.$table.'_à_'.date('H-i-s').'_le_'.date('d-m-Y').'.csv';
			 $fichier = basename($_FILES['fichier']['name']);
			 
			 if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)) 
			 {/*echo "Upload du fichier effectue avec succes !";*/}
			 else{/*echo "Echec de l\'upload !";*/}
			 
			 //move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier);
			 
		}

		//echo "Resultat Import SQL :";
	 
		//echo "<br>Chemin du fichier : upload/".$_FILES['fichier']['name']."<br><br>Resultat Import SQL : <br>";
	 
		mysql_connect('mysql51-120.perso','hrprofil_bdd','eSkf9fN2hgaB');
		mysql_select_db('hrprofil_bdd');
		mysql_query("SET NAMES UTF8");
	 
		//Le chemin d'acces a ton fichier sur le serveur
		$fichier = fopen("upload/".$_FILES['fichier']['name'], "r");
		//echo $fichier;
		
		//tant qu'on est pas a la fin du fichier :
		while (!feof($fichier))
		{
		
			// On recupere toute la ligne
			$uneLigne = addslashes(fgets($fichier));
			
			//On met dans un tableau les differentes valeurs trouvés (ici séparées par un ';')
			$tableauValeurs=explode(';', $uneLigne);
			$nbcol=count($tableauValeurs);	

			switch ($clne) // on indique sur quelle variable on travaille
			{ 
				case 2: // Si 2 colonnes
					$sql="INSERT IGNORE INTO ".$table." VALUES ('".$tableauValeurs[0]."','".$tableauValeurs[1]."')";
				break;
				
				case 3: // Si 3 colonnes
					$sql="INSERT IGNORE INTO ".$table." VALUES ('".$tableauValeurs[0]."','".$tableauValeurs[1]."','".$tableauValeurs[2]."')";
				break;
				
				case 4: // Si 4 colonnes
					$sql="INSERT IGNORE INTO ".$table." VALUES ('".$tableauValeurs[0]."','".$tableauValeurs[1]."','".$tableauValeurs[2]."','".$tableauValeurs[3]."')";
				break;
				
				case 12: // Si 12 colonnes
					$sql="INSERT IGNORE INTO ".$table." VALUES ('".$tableauValeurs[0]."','".$tableauValeurs[1]."','".$tableauValeurs[2]."','".$tableauValeurs[3]."','".$tableauValeurs[4]."','".$tableauValeurs[5]."','".$tableauValeurs[6]."','".$tableauValeurs[7]."','".$tableauValeurs[8]."','".$tableauValeurs[9]."','".$tableauValeurs[10]."','".$tableauValeurs[11]."')";
				break;
						
				default:
					echo '<img src="../../../images/nok.png" /> Echec de l\'import de données<br /><br />';
					echo '<a href="http://hr-profiler.fr/pages/p_import_export.php"><button class="btn btn-success btn-small">Revenir sur la page d\'import/export <i class="icon-white icon-home"></i></button></a><br/><br/>Message d\'erreur : ';
			}
			
			$req=mysql_query($sql)or die (mysql_error());	
		}
}

else echo "Type de fichier incorrect";

	//vérification et envoi d'une réponse à l'utilisateur
	if ($req)
	{
	echo "Ajout dans la table ".$table." effectué avec succès";
	}
	else
	{
	echo '<img src="../../../images/nok.png" /> Echec de l\'import de données<br /><br />';
	echo '<a href="http://hr-profiler.fr/pages/p_import_export.php"><button class="btn btn-success btn-small">Revenir sur la page d\'import/export <i class="icon-white icon-home"></i></button></a>';
	}
?>