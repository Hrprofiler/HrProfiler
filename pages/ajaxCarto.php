
<?php
	include_once '../includes/fonctions.php';
	$connexion =getDbConnexion();
	
	$niveau=(isset($_POST["niveau"])? $_POST["niveau"]:0);
	if(isset($_POST["table"]) && !$_POST["liaison"]){
		$table=$_POST["table"];
		if ($table=='Activite_generique'){
			$ListeDonnees=$connexion->query("SELECT id_actgen as id, lib_actgen as lib FROM Activite_generique");
			$TablesLiaison= array();
			array_push($TablesLiaison,'Lien_activite_generique_Activite_terrain');	
			array_push($TablesLiaison,'Lien_emploi_Activite_generique');	

		}
		elseif ($table=='Activite_terrain'){
			$ListeDonnees=$connexion->query("SELECT id_actter as id, lib_actter as lib FROM Activite_terrain");
			$TablesLiaison= array();
			array_push($TablesLiaison,'Lien_activite_generique_Activite_terrain');	
			array_push($TablesLiaison,'Lien_poste_Activite_terrain');	
			array_push($TablesLiaison,'Lien_profil_poste_Activite_terrain');	
		}
		elseif ($table=='Collaborateur'){
			$ListeDonnees=$connexion->query("SELECT id_collaborateur as id, CONCAT_WS(' ',nom_collaborateur, prenom_collaborateur) as lib FROM Collaborateur");
			$TablesLiaison= array();
			array_push($TablesLiaison,'Lien_portefeuille_Collaborateur');	
		}
		elseif ($table=='Competence'){
			$ListeDonnees=$connexion->query("SELECT id_competence as id, lib_competence as lib FROM Competence");
			$TablesLiaison= array();
			array_push($TablesLiaison,'Lien_activite_Competence');	
			array_push($TablesLiaison,'Lien_competence_portefeuille');
			
		}
		elseif ($table=='Emploi'){
			$ListeDonnees=$connexion->query("SELECT id_emploi as id, lib_emploi as lib FROM Emploi");
			$TablesLiaison= array();
			array_push($TablesLiaison,'Lien_emploi_Activite_generique');	
			array_push($TablesLiaison,'Lien_emploi_Portefeuille');	
			array_push($TablesLiaison,'Lien_emploi_Profil_poste');
		}
		elseif ($table=='Portefeuille'){
			$ListeDonnees=$connexion->query("SELECT id_portefeuille as id, lib_portefeuille as lib FROM Portefeuille");
			$TablesLiaison= array();
			array_push($TablesLiaison,'Lien_competence_portefeuille');	
			array_push($TablesLiaison,'Lien_emploi_Portefeuille');	
			array_push($TablesLiaison,'Lien_portefeuille_Collaborateur');
		}
		elseif ($table=='Poste'){
			$ListeDonnees=$connexion->query("SELECT  id_poste as id, libelle as lib FROM Poste");
			$TablesLiaison= array();
			array_push($TablesLiaison,'Lien_poste_Profil_poste');	
			array_push($TablesLiaison,'Lien_poste_Activite_terrain');	
		}
		else{
			$ListeDonnees=$connexion->query("SELECT id_profil_poste as id, lib_profil_poste as lib FROM Profil_poste");
			$TablesLiaison= array();
			array_push($TablesLiaison,'Lien_poste_Profil_poste');	
			array_push($TablesLiaison,'Lien_profil_poste_Activite_terrain');	
		}	
		while( $ListeDonnee = $ListeDonnees->fetch(PDO::FETCH_OBJ)){
			echo '<li name="niveau'.($niveau + 1).'" id="'.$ListeDonnee->id.microtime().'" 
			onclick="go('.$ListeDonnee->id.',this.id,'.($niveau + 1).",'".$table."'".')"><a>'.$ListeDonnee->lib.'</a></li>';				
		}
	}
	elseif(isset($_POST["table"]) && isset($_POST["liaison"])){
		$liaison=$_POST["liaison"];
		$table=$_POST["table"];
		$ListeDonneesLiaisons=$connexion->query("
		SELECT Table1, champ, champ_lie, Table_liaison FROM Liaisons WHERE Table_liee='".$table."'
		UNION
		SELECT Table_liee as Table1, champ_lie as champ, champ as champ_lie, Table_liaison FROM Liaisons WHERE Table1='".$table."'	
		");
		while( $ListeDonneesLiaison = $ListeDonneesLiaisons->fetch(PDO::FETCH_OBJ)){	
			echo '<li name="niveau'.($niveau + 1).'" id="'.$ListeDonneesLiaison->Table1.microtime().'" onclick="go(0,this.id,'.($niveau + 1).','."'".$ListeDonneesLiaison->Table1."'".')"><a><b>'.$ListeDonneesLiaison->Table1.'</b></a></li>';
			if($ListeDonneesLiaison->Table1=='Collaborateur')  {
				$ListeDonnees=$connexion->query("DESCRIBE ".$ListeDonneesLiaison->Table1);
				while( $ListeDonnee = $ListeDonnees->fetch(PDO::FETCH_OBJ)){	
					$ListeDonnees2=$connexion->query("
						SELECT T1.id_collaborateur as id, 
						CONCAT_WS(' ',T1.nom_collaborateur, T1.prenom_collaborateur) as lib, 
						null as descr 
						FROM ".$ListeDonneesLiaison->Table1." T1
						JOIN ".$ListeDonneesLiaison->Table_liaison." T2 ON T2.".$ListeDonneesLiaison->champ."= T1.".$ListeDonneesLiaison->champ."
						JOIN ".$table." T3 ON T3.".$ListeDonneesLiaison->champ_lie."= T2.".$ListeDonneesLiaison->champ_lie."
						WHERE T3.".$ListeDonneesLiaison->champ_lie."=".$liaison
					);
					while( $ListeDonnee2 = $ListeDonnees2->fetch(PDO::FETCH_OBJ)){ 
						echo '<li name="niveau'.($niveau + 1).'" id="'.$ListeDonnee2->id.microtime().'" data-toggle="popover" title="'.$ListeDonnee2->lib.'" data-content="'.$ListeDonnee2->descr.'" 
						onclick="go('.$ListeDonnee2->id.',this.id,'.($niveau + 1).",'".$ListeDonneesLiaison->Table1."'".')"><a>'.$ListeDonnee2->lib.'</a></li>';
					}
					break 1;
				}
			}
			else{
				$lib=NULL;
				$descr=NULL;
				$ListeDonnees=$connexion->query("DESCRIBE ".$ListeDonneesLiaison->Table1);
				while( $ListeDonnee = $ListeDonnees->fetch(PDO::FETCH_OBJ)){
					if(strpos($ListeDonnee->Field ,'lib')!==false) {
						$lib= 'T1.'.$ListeDonnee->Field;
					}
					if(strpos($ListeDonnee->Field ,'desc')!==false) {
						$descr='T1.'.$ListeDonnee->Field;
					}
					if(strlen($lib)>0 && (strlen($descr)>0||$ListeDonneesLiaison->Table1=='Profil_poste' ||$ListeDonneesLiaison->Table1=='Portefeuille')){
						$ListeDonnees2=$connexion->query("
							SELECT T1.".$ListeDonneesLiaison->champ." as id, 
							".$lib." as lib, 
							".($descr?$descr:'null')." as descr 
							FROM ".$ListeDonneesLiaison->Table1." T1
							JOIN ".$ListeDonneesLiaison->Table_liaison." T2 ON T2.".$ListeDonneesLiaison->champ."= T1.".$ListeDonneesLiaison->champ."
							JOIN ".$table." T3 ON T3.".$ListeDonneesLiaison->champ_lie."= T2.".$ListeDonneesLiaison->champ_lie."
							WHERE T3.".$ListeDonneesLiaison->champ_lie."=".$liaison
						);
						while( $ListeDonnee2 = $ListeDonnees2->fetch(PDO::FETCH_OBJ)){ 
							echo '<li name="niveau'.($niveau + 1).'" id="'.$ListeDonnee2->id.microtime().'" data-toggle="popover" title="'.$ListeDonnee2->lib.'" data-content="'.$ListeDonnee2->descr.'" 
							onclick="go('.$ListeDonnee2->id.',this.id,'.($niveau + 1).",'".$ListeDonneesLiaison->Table1."'".')"><a>'.$ListeDonnee2->lib.'</a></li>';
						}
						break 1;
					}
				}
			}
		}
}
	echo "<ul name='lien_donnees' id='lien_donnees' class='nav nav-pills nav-stacked pull-left'>";
		
?>
