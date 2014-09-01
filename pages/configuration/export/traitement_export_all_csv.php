<?php
	//on appel la fonction de connexion

	 // $table = Utilisateur;

// Creation du fichier
$namefile = 'download/'.$key.'_'.date('H-i-s').'_'.date('d-m-Y').'.csv';
$file = fopen($namefile, 'w+');

// Collecte des données de competences
$req = $bdd->query('SELECT * FROM '.$key.';');
$rep = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();

// Première ligne : ligne de titres
if(count($rep)){
   fputcsv($file, array_keys($rep[0]));
   echo 'Export de la table "<b>'.$key.'</b>" : <img src="../../../images/ok.png" /><br/>';
   }
   
// Ajout des lignes de données
foreach($rep as $row){
   fputcsv($file, $row, $delimiter = ';');
 }
 
// Fermeture du fichier
fclose($file);

?>