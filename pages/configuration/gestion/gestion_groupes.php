
<div id="conteneur_gestion_groupes">
	<?php
	//on appel la fonction de connexion
	$connexion =getDbConnexion();
	
	//on récup la liste des elements existant
	$ListeGroupes=$connexion->query("SELECT id_groupe, lib_groupe FROM Groupe");
	$ListeGroupes->setFetchMode(PDO::FETCH_OBJ);
	
	/*en fonction de l'actions :*/
	
	//si on supprime
	if (isset($_POST['del'])) {
		$connexion->exec("DELETE FROM Groupe WHERE id_groupe =".$_POST['id_Groupe']);
		header('Location: p_config_gestion2.php');
		 
	}
		
	//si on ajoute
	if ( isset($_POST['add'])){
		$connexion->exec("INSERT INTO Groupe  (lib_groupe) VALUES ('".$_POST['libelle']."')");
		header('Location: p_config_gestion2.php');   
		btAlertMini("alert-success", "Succès : ", "Groupe ajouté avec succés");  
		
	}

	
	//si on update
	if (isset($_POST['modif'])){
		$connexion->exec("UPDATE Groupe SET lib_groupe = '".$_POST['inputLibelle']."'
						WHERE id_groupe = '".$_POST['inputId']."'");
		header('Location: p_config_gestion2.php');
		btAlertMini("alert-success", "Succès : ", "Groupe modifié avec succés");
		
	}
	?>
	
	
	<?php 
		if (isset($_POST['edit'])) {
			$modifierGroupes=$connexion->query("SELECT  id_groupe, lib_groupe
							FROM Groupe
							WHERE id_groupe = '".$_POST['id_Groupe']."'");
			while( $modifierGroupe = $modifierGroupes->fetch(PDO::FETCH_OBJ)){
				?>
		<div class="container-fluid">
		<legend>Modification d'un groupe<div id="output" class="pull-right"></div></legend>
			<div class="container-fluid hero-unit">
				<form action="p_config_gestion2.php" method="post" class="form-horizontal">
					<div class="span8">
							<div class="control-group">
								<label class="control-label" for="inputLibelle">Libellé</label>
								<div class="controls">
									<input type="hidden" id="inputId" name="inputId" required="" value="<?php echo $modifierGroupe->id_groupe;?>">
									<input type="text" id="inputLibelle" name="inputLibelle" required="" value="<?php echo $modifierGroupe->lib_groupe;?>" >
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<button type="submit" name="modif" onMouseOver="show('Valider les modifications')" onMouseOut="hide()"  formaction="p_config_gestion2.php"  class="btn btn-success"><i class="icon-pencil icon-white"></i></button>
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
				btAlertMini("alert-success", "Succés : ", "Groupe supprimé");
			}
		?>
		<legend> Groupes <div id="output2" class="pull-right"></div></legend>
		<table class="table table-hover">
			<thead>
				<tr>
				<th>Libellé</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<form action="p_config_gestion2.php" method="post">
						<td>
							<input class="span1" type="text" name="libelle" placeholder="Libellé" required="true"/>
						</td>
						<td>
							<button type="submit" name="add" formaction="p_config_gestion2.php" onMouseOver="show2('Créer Groupe')" onMouseOut="hide2()" class="btn btn-success btn-mini"><i class="icon-ok icon-white"></i></button>
						</td>
					</form>
				</tr>
			<?php
				while( $obj = $ListeGroupes->fetch() ){
					echo '<tr>';
					echo '<td>'.$obj->lib_groupe.'</td>';
					echo '<td>
							<form action="p_config_gestion2.php" method="post" name="suppr_Groupe">
								<input type="hidden" name="id_Groupe" value="'.$obj->id_groupe.'"/>
								<button type="submit" name="edit" onMouseOver="show2(\'Modification du Groupe\')" onMouseOut="hide2()" formaction="p_config_gestion2.php" class="btn btn-warning btn-mini"><i class="icon-cog icon-white"></i></button>
								<button type="submit" name="del" onclick="return(confirm(\'Veuillez confirmer la suppression\'))"  onMouseOver="show2(\'Suppression du Groupe\')" onMouseOut="hide2()" formaction="p_config_gestion2.php" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i></button>
							</form>
						  </td>';
					echo '</tr>';
				}
			?>
			</tbody>
		</table>
	</div>
	
</div>