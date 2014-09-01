<?php

if(!empty($_POST['nom']) && (!empty($_POST['prenom'])) && (!empty($_POST['jour'])) && (!empty($_POST['mois'])) && (!empty($_POST['annee'])) && (!empty($_POST['ste'])) && (!empty($_POST['srv'])) && (!empty($_POST['sexe'])) && (!empty($_POST['tel'])) && (!empty($_POST['addr'])) && (!empty($_POST['cp'])) && (!empty($_POST['ville'])) && (!empty($_POST['mail']))) 
{

	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$jour = $_POST['jour'];
	$mois = $_POST['mois'];
	$annee = $_POST['annee'];
	$ste = $_POST['ste'];
	$srv = $_POST['srv'];
	$sexe = $_POST['sexe'];
	$tel = $_POST['tel'];
	$addr = $_POST['addr'];
	$cp = $_POST['cp'];
	$ville = $_POST['ville'];
	$mail = $_POST['mail'];

	$naiss = $annee . '-' . $mois . '-' .$jour;
	
	if(preg_match('/^[a-zA-Z0-9-_]+$/', $_POST["nom"]))
	{
		if(preg_match('/^[a-zA-Z0-9-_]+$/', $_POST["prenom"]))
		{
			
				try
				{
				$bdd = new PDO('mysql:host=localhost;dbname=hrprofil_bdd', 'root', '');
				}
				catch (Exception $e)
				{
						die('Erreur : ' . $e->getMessage());
				}

				$req = $bdd->prepare('INSERT INTO collaborateur(nom_collaborateur, prenom_collaborateur, naissance_collaborateur, societe_collaborateur, service_collaborateur, sexe_collaborateur, tel_collaborateur, adresse_collaborateur, cp_collaborateur, ville_collaborateur, mail_collaborateur) VALUES(:nom, :prenom, :naissance, :ste, :srv, :sexe, :tel, :addr, :cp, :ville, :mail)');
				$req->execute(array(
					'nom' => $nom,
					'prenom' => $prenom,
					'naissance' => $naiss,
					'ste' => $ste,
					'srv' => $srv,
					'sexe' => $sexe,
					'tel' => $tel,
					'addr' => $addr,
					'cp' => $cp,
					'ville' => $ville,
					'mail' => $mail
					));

				echo 'Le collaborateur est cree';
		}
		else
		echo "Caractere speciaux dans le prenom";
	}
	else 
	echo "Caractere speciaux dans le nom";
}
else
echo "Verifier le formulaire il y a une case vide";

?>