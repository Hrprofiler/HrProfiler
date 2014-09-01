<?php
	include '../includes/header.php';
	include '../includes/fonctions.php';
?>
<?php
//on appel la fonction de connexion
$connexion =getDbConnexion();

//on récup la liste des elements existant
$ListePostes=$connexion->query("SELECT id, libelle, description, occuper FROM Poste");
$ListePostes->setFetchMode(PDO::FETCH_OBJ);

/*en fonction de l'actions :*/

//si on supprime
if (isset($_POST['del'])) {
	$connexion->exec("DELETE FROM Poste WHERE id =".$_POST['id_poste']);
}
	
//si on ajoute
if ( isset($_POST['add'])){
	$connexion->exec("INSERT INTO Poste SET libelle = '".$_POST['libelle']."', 
										description = '".$_POST['description']."',
										occuper = ".$_POST['occuper']);
}

//si on update
if (isset($_POST['modif'])){
	$connexion->exec("UPDATE Poste SET libelle = '".$_POST['inputLibelle']."',
									description = '".$_POST['inputDescription']."',
									occuper = '".$_POST['inputOccuper']."'
					WHERE id = '".$_POST['inputId']."'");
	btAlertMini("alert-success", "Succès : ", "Poste modifié avec succés");
}
?>


<?php 
	if (isset($_POST['edit'])) {
		$modifierPostes=$connexion->query("SELECT  id, libelle, description, occuper 
						FROM Poste
						WHERE Poste.id = '".$_POST['id_poste']."'");
		while( $modifierPoste = $modifierPostes->fetch(PDO::FETCH_OBJ)){
			?>
	<div class="container-fluid">
	<legend>Modification d'un poste<div id="output" class="pull-right"></div></legend>
		<div class="container-fluid hero-unit">
			<form action="form_poste.php" method="post" class="form-horizontal">
				<div class="span6">
						<div class="control-group">
							<label class="control-label" for="inputLibelle">Libellé</label>
							<div class="controls">
								<input type="hidden" id="inputId" name="inputId" required="" value="<?php echo $modifierPoste->id;?>">
								<input type="text" id="inputLibelle" name="inputLibelle" required="" value="<?php echo $modifierPoste->libelle;?>" >
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputDescription">Description</label>
							<div class="controls">
								<input type="text" id="inputDescription" name="inputDescription" required="" value="<?php echo $modifierPoste->description;?>">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputOccuper">Occupé</label>
							<div class="controls">
								<input type="text" id="inputOccuper" name="inputOccuper" required="" value="<?php echo $modifierPoste->occuper;?>">
						</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button type="submit" name="modif" onMouseOver="show('Valider les modifications')" onMouseOut="hide()"  formaction="form_poste.php"  class="btn btn-success"><i class="icon-pencil icon-white"></i></button>
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
			btAlertMini("alert-success", "Succés : ", "Poste supprimé");
		}
	?>
	<legend> Liste des postes <div id="output2" class="pull-right"></div></legend>
	<table class="table table-hover">
		<thead>
			<tr>
			<th>#</th>
			<th>Libellé</th>
			<th>Description</th>
			<th>Occupé</th>
			<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<form action="form_poste.php" method="post">
					<td>0</td>
					<td>
						<input class="span1" type="text" name="libelle" placeholder="Libellé" required=""/>
					</td>
					<td>
						<input class="span2" type="text" name="description" placeholder="Description" required=""/>
					</td>
					<td>
						<input class="span2" type="text" name="occuper" placeholder="Occupé" required=""/>
					</td>
					<td>
						<button type="submit" name="add" formaction="form_poste.php" onMouseOver="show2('Créer poste')" onMouseOut="hide2()" class="btn btn-success btn-mini"><i class="icon-ok icon-white"></i></button>
					</td>
				</form>
			</tr>
		<?php
			while( $obj = $ListePostes->fetch() ){
				echo '<tr>';
				echo '<td>'.$obj->id.'</td>';
				echo '<td>'.$obj->libelle.'</td>';
				echo '<td>'.$obj->description.'</td>';
				echo '<td>'.$obj->occuper.'</td>';
				echo '<td>
						<form action="form_poste.php" method="post" name="suppr_poste">
							<input type="hidden" name="id_poste" value="'.$obj->id.'"/>
							<button type="submit" name="edit" onMouseOver="show2(\'Modification du poste\')" onMouseOut="hide2()" formaction="form_poste.php" class="btn btn-warning btn-mini"><i class="icon-cog icon-white"></i></button>
							<button type="submit" name="del" onclick="return(confirm(\'Veuillez confirmer la suppression\'))"  onMouseOver="show2(\'Suppression du poste\')" onMouseOut="hide2()" formaction="form_poste.php" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i></button>
						</form>
					  </td>';
				echo '</tr>';
			}
		?>
		</tbody>
	</table>
</div>
<?php
include '../includes/bottom.php';
?>