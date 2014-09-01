<?php
//on appel la fonction de connexion
$connexion =getDbConnexion();

//on récup la liste des elements existant
$listeCollaborateurs=$connexion->query("SELECT id_collaborateur, nom_collaborateur, prenom_collaborateur, sexe_collaborateur, naissance_collaborateur, adresse_collaborateur, cp_collaborateur, ville_collaborateur, tel_collaborateur, mail_collaborateur, societe_collaborateur, service_collaborateur  FROM Collaborateur");
$listeCollaborateurs->setFetchMode(PDO::FETCH_OBJ);

/*en fonction de l'actions :*/

//si on supprime
if (isset($_POST['del'])) {
	$connexion->exec("DELETE FROM Collaborateur WHERE id_collaborateur =".$_POST['idcollaborateur']);
	header('Location: p_edition.php?form=collab');   
	btAlertMini("alert-success", "Succès : ", "Collaborateur supprimé avec succés");
}
	
//si on ajoute
if ( isset($_POST['add'])){

	/*$connexion->exec("INSERT INTO Collaborateur SET nom_collaborateur = '".$_POST['nom']."',
													prenom_collaborateur = '".$_POST['prenom']."',
													sexe_collaborateur = '".$_POST['sexe']."',
													naissance_collaborateur = '".$_POST['naissance']."',
													adresse_collaborateur = '".$_POST['adresse']."',
													cp_collaborateur = '".$_POST['cp']."',
													ville_collaborateur = '".$_POST['ville']."',
													tel_collaborateur = '".$_POST['tel']."',
													mail_collaborateur = '".$_POST['mail']."',
													societe_collaborateur = '".$_POST['societe']."',
													service_collaborateur = '".$_POST['service']."'");*/
	$connexion->exec("INSERT INTO Collaborateur SET nom_collaborateur = '".$_POST['nom']."',
													prenom_collaborateur = '".$_POST['prenom']."',
													mail_collaborateur = '".$_POST['mail']."'");
	
	
	header('Location: p_edition.php?form=collab');  
	btAlertMini("alert-success", "Succès : ", "Collaborateur ajouté avec succés");								
}

//si on update
if (isset($_POST['modif'])){
	
	$connexion->exec("UPDATE Collaborateur SET nom_collaborateur = '".$_POST['inputNom']."',
												prenom_collaborateur = '".$_POST['inputPrenom']."',
												sexe_collaborateur = '".$_POST['inputSexe']."',
												naissance_collaborateur = '".$_POST['inputNaissance']."',
												adresse_collaborateur = '".$_POST['inputAdresse']."',
												cp_collaborateur = '".$_POST['inputCp']."',
												ville_collaborateur = '".$_POST['inputVille']."',
												tel_collaborateur = '".$_POST['inputTel']."',
												mail_collaborateur = '".$_POST['inputMail']."',
												societe_collaborateur = '".$_POST['inputSociete']."',
									service_collaborateur = '".$_POST['inputService']."'
									
					WHERE id_collaborateur = '".$_POST['inputIdcollaborateur']."'");
					
	header('Location: p_edition.php?form=collab');   
	btAlertMini("alert-success", "Succès : ", "Collaborateur modifié avec succés");
}
?>


<?php 
	if (isset($_POST['edit'])) {

		$modifierCollaborateur=$connexion->query("SELECT id_collaborateur, 
															nom_collaborateur, 
															prenom_collaborateur, 
															sexe_collaborateur, 
															naissance_collaborateur, 
															adresse_collaborateur, 
															cp_collaborateur, 
															ville_collaborateur, 
															tel_collaborateur, 
															mail_collaborateur, 
															societe_collaborateur, 
															service_collaborateur  
						FROM Collaborateur
						WHERE id_collaborateur =".$_POST['idcollaborateur']);
		while( $modifierCollaborateur = $modifierCollaborateur->fetch(PDO::FETCH_OBJ)){
			?>
			
			
	<div class="container-fluid">
	<legend>Modification d'un collaborateur<div id="output" class="pull-right"></div></legend>
		<div class="container-fluid hero-unit">
			<form action="p_edition.php?form=collab" method="post" class="form-horizontal">
				<div class="span6">
						<div class="control-group">
							<label class="control-label" for="inputNom">Nom</label>
							<div class="controls">
								<input type="hidden" id="inputIdcollaborateur" name="inputIdcollaborateur" required="" value="<?php echo $modifierCollaborateur->id_collaborateur;?>">
								<input type="text" id="inputNom" name="inputNom" required="" value="<?php echo $modifierCollaborateur->nom_collaborateur;?>" >
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="inputPrenom">Prenom</label>
							<div class="controls">
								<input type="text" id="inputPrenom" name="inputPrenom" required="" value="<?php echo $modifierCollaborateur->prenom_collaborateur;?>">
							</div>
						</div>
						
						
						<div class="control-group">
							<label class="control-label" for="inputSexe">Sexe</label>
							<div class="controls">
								<input type="text" id="inputSexe" name="inputSexe" required="" value="<?php echo $modifierCollaborateur->sexe_collaborateur;?>">
							</div>
						</div>
						
						
						<div class="control-group">
							<label class="control-label" for="inputNaissance">Date de naissance</label>
							<div class="controls">
								<input type="text" id="inputNaissance" name="inputNaissance" required="" value="<?php echo $modifierCollaborateur->naissance_collaborateur;?>">
							</div>
						</div>
						
						
						<div class="control-group">
							<label class="control-label" for="inputAdresse">Adresse</label>
							<div class="controls">
								<input type="text" id="inputAdresse" name="inputAdresse" required="" value="<?php echo $modifierCollaborateur->adresse_collaborateur;?>">
							</div>
						</div>
						
						
						<div class="control-group">
							<label class="control-label" for="inputCp">Code postal</label>
							<div class="controls">
								<input type="text" id="inputCp" name="inputCp" required="" value="<?php echo $modifierCollaborateur->cp_collaborateur;?>">
							</div>
						</div>
						
						
							<div class="control-group">
							<label class="control-label" for="inputVille">Ville</label>
							<div class="controls">
								<input type="text" id="inputVille" name="inputVille" required="" value="<?php echo $modifierCollaborateur->ville_collaborateur;?>">
							</div>
						</div>
						
						
							<div class="control-group">
							<label class="control-label" for="inputTel">Téléphone</label>
							<div class="controls">
								<input type="text" id="inputTel" name="inputTel" required="" value="<?php echo $modifierCollaborateur->tel_collaborateur;?>">
							</div>
						</div>
						
						
							<div class="control-group">
							<label class="control-label" for="inputMail">Adresse mail</label>
							<div class="controls">
								<input type="text" id="inputMail" name="inputMail" required="" value="<?php echo $modifierCollaborateur->mail_collaborateur;?>">
							</div>
						</div>
						
						
							<div class="control-group">
							<label class="control-label" for="inputSociete">Société</label>
							<div class="controls">
								<input type="text" id="inputSociete" name="inputSociete" required="" value="<?php echo $modifierCollaborateur->societe_collaborateur;?>">
							</div>
						</div>
						
						
							<div class="control-group">
							<label class="control-label" for="inputService">Service</label>
							<div class="controls">
								<input type="text" id="inputService" name="inputService" required="" value="<?php echo $modifierCollaborateur->service_collaborateur;?>">
							</div>
						</div>
						
			
						<div class="control-group">
							<div class="controls">
								<button type="submit" name="modif" onMouseOver="show('Valider les modifications')" onMouseOut="hide()"  formaction="p_edition.php?form=collab"  class="btn btn-success"><i class="icon-pencil icon-white"></i></button>
							</div>
						</div>
					</div>
			</form>
		</div>
	</div>
		<?php 
		}
	}
?>
<div class="container-fluid">
	<?php 
		if (isset($_POST['del'])) {
			btAlertMini("alert-success", "Succés : ", "Collaborateur supprimé");
		}
	?>
	<legend> Liste des collaborateurs <div id="output2" class="pull-right"></div></legend>
	<table class="table table-hover">
		<thead>
			<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<!--<th>Sexe</th>
			<th>Date de naissance</th>
			<th>Adresse</th>
			<th>Code postal</th>
			<th>Ville</th>
			<th>Téléphone</th>-->
			<th>Mail</th>
			<!--<th>Société</th>
			<th>Service</th>-->
			<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<form action="p_edition.php?form=collab" method="post">
					<td>
						<input class="span1" type="text" name="nom" placeholder="Nom" required=""/>
					</td>
					<td>
						<input class="span2" type="text" name="prenom" placeholder="Prénom" required=""/>
					</td>
					<!--<td>
						<input class="span2" type="text" name="sexe" placeholder="Sexe" required=""/>
					</td>
					<td>
						<input class="span2" type="text" name="naissance" placeholder="Date de naissance" required=""/>
					</td>
					<td>
						<input class="span2" type="text" name="adresse" placeholder="Adresse" required=""/>
					</td>
					<td>
						<input class="span2" type="text" name="cp" placeholder="Code postal" required=""/>
					</td>
					<td>
						<input class="span2" type="text" name="ville" placeholder="Ville" required=""/>
					</td>
					<td>
						<input class="span2" type="text" name="tel" placeholder="Téléphone" required=""/>
					</td>-->
					<td>
						<input class="span2" type="text" name="mail" placeholder="Mail" required=""/>
					</td>
					<!--<td>
						<input class="span2" type="text" name="societe" placeholder="Société" required=""/>
					</td>
					<td>
						<input class="span2" type="text" name="service" placeholder="Service" required=""/>
					</td>-->
				
					<td>
						<button type="submit" name="add" formaction="p_edition.php?form=collab" onMouseOver="show2('Créer collaborateur')" onMouseOut="hide2()" class="btn btn-success btn-mini"><i class="icon-ok icon-white"></i></button>
					</td>
				</form>
			</tr>
		<?php
			while( $obj = $listeCollaborateurs->fetch() ){
				echo '<tr>';
				//echo '<td>'.$obj->id_collaborateur.'</td>';
				echo '<td>'.$obj->nom_collaborateur.'</td>';                    											  
				echo '<td>'.$obj->prenom_collaborateur.'</td>';
				//echo '<td>'.$obj->sexe_collaborateur.'</td>';
				//echo '<td>'.$obj->naissance_collaborateur.'</td>';
				//echo '<td>'.$obj->adresse_collaborateur.'</td>';
				//echo '<td>'.$obj->cp_collaborateur.'</td>';
				//echo '<td>'.$obj->ville_collaborateur.'</td>';
				//echo '<td>'.$obj->tel_collaborateur.'</td>';
				echo '<td>'.$obj->mail_collaborateur.'</td>';
				//echo '<td>'.$obj->societe_collaborateur.'</td>';
				//echo '<td>'.$obj->service_collaborateur.'</td>';
				echo '<td>
						<form action="p_edition.php?form=collab" method="post" name="suppr_collaborateur">
							<input type="hidden" name="idcollaborateur" value="'.$obj->id_collaborateur.'"/>
							<button type="submit" name="edit" onMouseOver="show2(\'Modification du collaborateur\')" onMouseOut="hide2()" formaction="p_edition.php?form=collab" class="btn btn-warning btn-mini"><i class="icon-cog icon-white"></i></button>
							<button type="submit" name="del" onclick="return(confirm(\'Veuillez confirmer la suppression\'))"  onMouseOver="show2(\'Suppression du collaborateur\')" onMouseOut="hide2()" formaction="p_edition.php?form=collab" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i></button>
						</form>
					  </td>';
				echo '</tr>';
			}
		?>
		</tbody>
	</table>
</div>