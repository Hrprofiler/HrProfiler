<?php
//on appel la fonction de connexion
$connexion =getDbConnexion();

//on récup la liste des elements existant
$ListeActter=$connexion->query("SELECT id_actter, lib_actter, descr_actter FROM Activite_terrain");
$ListeActter->setFetchMode(PDO::FETCH_OBJ);

/*en fonction de l'actions :*/

//si on supprime
if (isset($_POST['del'])) {
	$connexion->exec("DELETE FROM Activite_terrain WHERE id_actter =".$_POST['idactter']);
	header('Location: p_edition.php?form=act_ter');   
	btAlertMini("alert-success", "Succès : ", "Activité terrain supprimée avec succés");
}
	
//si on ajoute
if ( isset($_POST['add'])){

	$connexion->exec("INSERT INTO Activite_terrain SET lib_actter = '".$_POST['libactter']."',
										descr_actter = '".$_POST['descractter']."'");
	header('Location: p_edition.php?form=act_ter');  
	btAlertMini("alert-success", "Succès : ", "Activité terrain ajoutée avec succés");								
}

//si on update
if (isset($_POST['modif'])){
	
	$connexion->exec("UPDATE Activite_terrain SET lib_actter = '".$_POST['inputLibactter']."',
									descr_actter = '".$_POST['inputDescractter']."'
									
					WHERE id_actter = '".$_POST['inputIdactter']."'");
					
	header('Location: p_edition.php?form=act_ter');   
	btAlertMini("alert-success", "Succès : ", "Activité terrain modifiée avec succés");
}
$rafraichir=0;

// si on ajoute un lien entre une activité generique et une compétence:
if (isset($_POST['add_lien_actter_comp'])){
	$connexion->exec("INSERT INTO Lien_activite_Competence SET id_actter = '".$_POST['idactter']."', id_competence= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idactter'];
	//header('Location: p_edition.php?form=act_ter');  
							
}

// si on ajoute un lien entre une activité générique et une activité terrain:
if (isset($_POST['add_lien_actgen_actter'])){
	$connexion->exec("INSERT INTO Lien_activite_generique_Activite_terrain SET id_actgen = '".$_POST['inputLiaison']."', id_actter= '".$_POST['idactter']."'");
	$rafraichir=$_POST['idactter'];
	//header('Location: p_edition.php?form=act_ter');  					
}

// si on ajoute un lien entre un Poste et une activite terrain:
if (isset($_POST['add_lien_actter_poste'])){
	$connexion->exec("INSERT INTO Lien_poste_Activite_terrain SET id_poste = '".$_POST['inputLiaison']."', id_actter= '".$_POST['idactter']."'");
	$rafraichir=$_POST['idactter'];
	//header('Location: p_edition.php?form=act_ter');  					
}

//si on supprime un lien
if (isset($_POST['casser_lien'])){
	//on récupere les noms des champs de la table liens
	switch ($_POST['table']) {
	    case 'Lien_activite_Competence':
	        $connexion->exec("DELETE FROM Lien_activite_Competence WHERE id_competence =".$_POST['champ']." and id_actter=".$_POST['champ_lie']);
			break;
		case 'Lien_activite_generique_Activite_terrain':
	        $connexion->exec("DELETE FROM Lien_activite_generique_Activite_terrain WHERE id_actgen =".$_POST['champ']." and id_actter=".$_POST['champ_lie']);
			break;
	    case 'Lien_poste_Activite_terrain':
	        $connexion->exec("DELETE FROM Lien_poste_Activite_terrain WHERE id_poste =".$_POST['champ']." and id_actter=".$_POST['champ_lie']);
			break;
	}
	$rafraichir=$_POST['champ_lie'];
}
?>


<?php 
	if (isset($_POST['edit'])) {

		$modifierActter=$connexion->query("SELECT id_actter, lib_actter, descr_actter
						FROM Activite_terrain
						WHERE id_actter =".$_POST['idactter']);
		$modifierActter = $modifierActter->fetch(PDO::FETCH_OBJ);
			?>
			
	<div class="container-fluid">
	<legend>Modification d'une activité terrain<div id="output" class="pull-right"></div></legend>
		<div class="container-fluid hero-unit">
			<form action="p_edition.php?form=act_ter" method="post" class="form-horizontal">
				<div class="span6">
						<div class="control-group">
							<label class="control-label" for="inputLibactter">Libellé</label>
							<div class="controls">
								<input type="text" id="inputIdactter" name="inputIdactter" required="" value="<?php echo $modifierActter->id_actter;?>">
								<input type="text" id="inputLibactter" name="inputLibactter" required="" value="<?php echo $modifierActter->lib_actter;?>" >
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="inputDescractter">Description</label>
							<div class="controls">
								<input type="text" id="inputDescractter" name="inputDescractter" required="" value="<?php echo $modifierActter->descr_actter;?>">
							</div>
						</div>
						
			
						<div class="control-group">
							<div class="controls">
								<button type="submit" name="modif" onMouseOver="show('Valider les modifications')" onMouseOut="hide()"  formaction="p_edition.php?form=act_ter"  class="btn btn-success"><i class="icon-pencil icon-white"></i></button>
							</div>
						</div>
					</div>
			</form>
		</div>
	</div>
		<?php 
		
	}
?>
<?php
	if (!isset($_POST['edit'])) {
		?>	
<div class="container-fluid">
	<?php 
		if (isset($_POST['del'])) {
			btAlertMini("alert-success", "Succés : ", "Activité terrain supprimée");
		}
	?>
	<legend> Liste des activités terrain <div id="output2" class="pull-right"></div></legend>
	<table class="table table-hover">
		<thead>
			<tr>
			<th>Libellé</th>
			<th>Description</th>
			<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<form action="p_edition.php?form=act_ter" method="post">
					<td>
						<input class="span1" type="text" name="libactter" placeholder="Libellé" required=""/>
					</td>
					<td>
						<input class="span2" type="text" name="descractter" placeholder="Description" required=""/>
					</td>
					
					<td>
						<button type="submit" name="add" formaction="p_edition.php?form=act_ter" onMouseOver="show2('Créer une activité terrain')" onMouseOut="hide2()" class="btn btn-success btn-mini"><i class="icon-ok icon-white"></i></button>
					</td>
				</form>
			</tr>
		<?php
			while( $obj = $ListeActter->fetch() ){
				?>
<!----Pop-UP des lien avec l'élement cliqué DEBUT--->
	<div class="modal fade" style="display:none" id="myModal_<?php echo $obj->id_actter;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Activité Terrain: <?php echo $obj->lib_actter;?></h4>
				</div>
				<div class="modal-body">
					<h4>Compétences liées:</h4>
					<ul class="liste_liens">
					<?php 
					$ListeCompLies=$connexion->query("SELECT C.id_competence, C.lib_competence 
														FROM Competence C
														JOIN Lien_activite_Competence L ON L.id_competence = C.id_competence
														WHERE L.id_actter=".$obj->id_actter);
					$ListeCompLies->setFetchMode(PDO::FETCH_OBJ);
					while( $ListeCompLie = $ListeCompLies->fetch() ){
						echo'<li>
							<div class="div_align">
								<form action="p_edition.php?form=act_ter" method="post" name="casser_lien">
									<input type="hidden" name="table" value="Lien_activite_Competence"/>
									<input type="hidden" name="champ" value="'.$ListeCompLie->id_competence.'"/>
									<input type="hidden" name="champ_lie" value="'.$obj->id_actter.'"/> 
									<button type="submit" name="casser_lien" formaction="p_edition.php?form=act_ter" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
								</form>
							</div>
							<div class="div_align">'.$ListeCompLie->lib_competence.'</div>
						</li>		
						';
						}
					?>
					</ul>
					<!----Formulaire d'ajout de lien entre actgen et competence DEBUT--->
					<form action="p_edition.php?form=act_ter" method="post">
						<input type="hidden" name="idactter" value="<?php echo $obj->id_actter; ?>"/>
						<?php
						$ListeCompNonLies=$connexion->query("SELECT C.id_competence, C.lib_competence  
															FROM Competence C
															WHERE C.id_competence NOT IN(SELECT C.id_competence 
															FROM Competence C
															JOIN Lien_activite_Competence L ON L.id_competence = C.id_competence
															WHERE L.id_actter=".$obj->id_actter.")");
						$ListeCompNonLies->setFetchMode(PDO::FETCH_OBJ);
						?>
						<select name="inputLiaison"  class="selectpicker form-control">
							<?php
							while( $ListeCompNonLie = $ListeCompNonLies->fetch()){
								echo'<option value="'.$ListeCompNonLie->id_competence.'">'.$ListeCompNonLie->lib_competence.'</option>';
							}
							?>
						</select>
						<button type="submit" name="add_lien_actter_comp" formaction="p_edition.php?form=act_ter" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
					</form> 
					<!----Formulaire d'ajout de lien entre actgen et competence FIN--->
					<h4>Activités Génériques liées:</h4>
					<ul class="liste_liens">
						<?php 
						$ListeActgenLies=$connexion->query("SELECT A.id_actgen, A.lib_actgen
															FROM Activite_generique A
															JOIN Lien_activite_generique_Activite_terrain L ON L.id_actgen = A.id_actgen
															WHERE L.id_actter=".$obj->id_actter);
						$ListeActgenLies->setFetchMode(PDO::FETCH_OBJ);
						while( $ListeActgenLie = $ListeActgenLies->fetch()){
							echo'<li>
								<div class="div_align">
									<form action="p_edition.php?form=act_ter" method="post" name="casser_lien">
										<input type="hidden" name="table" value="Lien_activite_generique_Activite_terrain"/>
										<input type="hidden" name="champ" value="'.$ListeActgenLie->id_actgen.'"/>
										<input type="hidden" name="champ_lie" value="'.$obj->id_actter.'"/> 
										<button type="submit" name="casser_lien" formaction="p_edition.php?form=act_ter" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
									</form>
								</div>
								<div class="div_align">'.$ListeActgenLie->lib_actgen.'</div>
							</li>		
							';
							}
						?>
					</ul>
					<!----Formulaire d'ajout de lien entre actgen et Activite terrain DEBUT--->
					<form action="p_edition.php?form=act_ter" method="post">
						<input type="hidden" name="idactter" value="<?php echo $obj->id_actter; ?>"/>
						<?php
						$ListeActgenNonLies=$connexion->query("SELECT A.id_actgen, A.lib_actgen
															FROM Activite_generique A
															WHERE A.id_actgen NOT IN(SELECT A.id_actgen
															FROM Activite_generique A
															JOIN Lien_activite_generique_Activite_terrain L ON L.id_actgen = A.id_actgen
															WHERE L.id_actter=".$obj->id_actter.")");
						$ListeActgenNonLies->setFetchMode(PDO::FETCH_OBJ);
						?>
						<select name="inputLiaison"  class="selectpicker form-control">
							<?php
							while( $ListeActgenNonLie = $ListeActgenNonLies->fetch()){
								echo'<option value="'.$ListeActgenNonLie->id_actgen.'">'.$ListeActgenNonLie->lib_actgen.'</option>';
							}
							?>
						</select>
						<button type="submit" name="add_lien_actgen_actter" formaction="p_edition.php?form=act_ter" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
					</form>
					<!----Formulaire d'ajout de lien entre actgen et Activite terrain FIN--->
					<h4>Poste liés:</h4>
					<ul class="liste_liens">
					<?php 
					$ListePosteLies=$connexion->query("SELECT P.id_poste, P.libelle
														FROM Poste P
														JOIN Lien_poste_Activite_terrain L ON L.id_poste = P.id_poste
														WHERE L.id_actter=".$obj->id_actter);
					$ListePosteLies->setFetchMode(PDO::FETCH_OBJ);
					while( $ListePosteLie = $ListePosteLies->fetch() ){
						echo'<li>
								<div class="div_align">
									<form action="p_edition.php?form=act_ter" method="post" name="casser_lien">
										<input type="hidden" name="table" value="Lien_poste_Activite_terrain"/>
										<input type="hidden" name="champ" value="'.$ListePosteLie->id_poste.'"/>
										<input type="hidden" name="champ_lie" value="'.$obj->id_actter.'"/> 
										<button type="submit" name="casser_lien" formaction="p_edition.php?form=act_ter" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
									</form>
								</div>
								<div class="div_align">'.$ListePosteLie->libelle.'</div>
							</li>		
							';
						}
					?>
					</ul>
					<!----Formulaire d'ajout de lien entre actgen et poste DEBUT--->
					<form action="p_edition.php?form=act_ter" method="post">
						<input type="hidden" name="idactter" value="<?php echo $obj->id_actter; ?>"/>
						<?php
						$ListePosteNonLies=$connexion->query("SELECT P.id_poste, P.libelle
															FROM Poste P
															WHERE P.id_poste NOT IN(SELECT P.id_poste
															FROM Poste P
															JOIN Lien_poste_Activite_terrain L ON L.id_poste = P.id_poste
															WHERE L.id_actter=".$obj->id_actter.")"); 
						$ListePosteNonLies->setFetchMode(PDO::FETCH_OBJ);
						?>
						<select name="inputLiaison"  class="selectpicker form-control">
							<?php
							while( $ListePosteNonLie = $ListePosteNonLies->fetch()){
								echo'<option value="'.$ListePosteNonLie->id_poste.'">'.$ListePosteNonLie->libelle.'</option>';
							}
							?>
						</select>
						<button type="submit" name="add_lien_actter_poste" formaction="p_edition.php?form=act_ter" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
					</form>
					<!----Formulaire d'ajout de lien entre actgen et emploi FIN--->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal">Fermer</button>
				</div>
			</div>
		</div>
	</div>
<!----Pop-UP des lien avec l'élement cliqué FIN--->
					
					<?php		
				echo '<tr>';
				echo '<td><a onclick="details('.$obj->id_actter.')">'.$obj->lib_actter.'</a></td>';
				echo '<td>'.$obj->descr_actter.'</td>';
				echo '<td>
						<form action="p_edition.php?form=act_ter" method="post" name="suppr_actter">
							<input type="hidden" name="idactter" value="'.$obj->id_actter.'"/>
							<button type="submit" name="edit" onMouseOver="show2(\'Modification de activité terrain\')" onMouseOut="hide2()" formaction="p_edition.php?form=act_ter" class="btn btn-warning btn-mini"><i class="icon-cog icon-white"></i></button>
							<button type="submit" name="del" onclick="return(confirm(\'Veuillez confirmer la suppression\'))"  onMouseOver="show2(\'Suppression de activité terrain\')" onMouseOut="hide2()" formaction="p_edition.php?form=act_ter" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i></button>
						</form>
					  </td>';
				echo '</tr>';
			}
		?>
		</tbody>
	</table>
</div>
<?php
}
?>
<script type="text/javascript" language="JavaScript">
   function details(id){
   		$('#myModal_'+id).modal('show');
   }
</script>
<?php
if ($rafraichir !=0){
	?>
	<script type="text/javascript" language="JavaScript">
   		$('#myModal_'+<?php echo $rafraichir; ?>).modal('show');
	</script>
	<?php
}
?>