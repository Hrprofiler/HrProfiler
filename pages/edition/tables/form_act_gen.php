<?php
//on appel la fonction de connexion
$connexion =getDbConnexion();

//on récup la liste des elements existant
$ListeActgen=$connexion->query("SELECT id_actgen, lib_actgen, descr_actgen FROM Activite_generique");
$ListeActgen->setFetchMode(PDO::FETCH_OBJ);

/*en fonction de l'actions :*/

//si on supprime
if (isset($_POST['del'])) {
	$connexion->exec("DELETE FROM Activite_generique WHERE id_actgen =".$_POST['idactgen']);
	header('Location: p_edition.php?form=act_gen');   
	btAlertMini("alert-success", "Succès : ", "Activité générique supprimée avec succés");
}
	
//si on ajoute
if ( isset($_POST['add'])){

	$connexion->exec("INSERT INTO Activite_generique SET lib_actgen = '".$_POST['libactgen']."',
										descr_actgen = '".$_POST['descractgen']."'");
	header('Location: p_edition.php?form=act_gen');   
	btAlertMini("alert-success", "Succès : ", "Activité générique ajoutée avec succés");								
}

//si on update
if (isset($_POST['modif'])){
	$connexion->exec("UPDATE Activite_generique SET lib_actgen = '".$_POST['inputLibactgen']."',
									descr_actgen = '".$_POST['inputDescractgen']."'
									
					WHERE id_actgen = '".$_POST['inputIdactgen']."'");
	header('Location: p_edition.php?form=act_gen');   
	btAlertMini("alert-success", "Succès : ", "Activité générique modifiée avec succés");
}
$rafraichir=0;

// si on ajoute un lien entre une activité generique et une compétence:
if (isset($_POST['add_lien_actgen_comp'])){
	$connexion->exec("INSERT INTO Lien_activite_Competence SET id_actgen = '".$_POST['idactgen']."', id_competence= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idactgen'];
	//header('Location: p_edition.php?form=act_gen');  
						
}

// si on ajoute un lien entre une activité générique et une activité terrain:
if (isset($_POST['add_lien_actgen_actter'])){
	$connexion->exec("INSERT INTO Lien_activite_generique_Activite_terrain SET id_actgen = '".$_POST['idactgen']."', id_actter= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idactgen'];
	//header('Location: p_edition.php?form=act_gen');  					
}


// si on ajoute un lien entre activité générique et un emploi:
if (isset($_POST['add_lien_actgen_emp'])){
	$connexion->exec("INSERT INTO Lien_emploi_Activite_generique SET id_actgen = '".$_POST['idactgen']."', id_emploi= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idactgen'];
	
	//header('Location: p_edition.php?form=act_gen');  						
}

//si on supprime un lien
if (isset($_POST['casser_lien'])){
	//on récupere les noms des champs de la table liens
	switch ($_POST['table']) {
	    case 'Lien_activite_Competence':
	        $connexion->exec("DELETE FROM Lien_activite_Competence WHERE id_competence =".$_POST['champ']." and id_actgen=".$_POST['champ_lie']);
			break;
	    case 'Lien_activite_generique_Activite_terrain':
	        $connexion->exec("DELETE FROM Lien_activite_generique_Activite_terrain WHERE id_actter =".$_POST['champ']." and id_actgen=".$_POST['champ_lie']);
			break;
		case 'Lien_emploi_Activite_generique':
	        $connexion->exec("DELETE FROM Lien_emploi_Activite_generique WHERE id_emploi =".$_POST['champ']." and id_actgen=".$_POST['champ_lie']);
			break;
	}
	
	$rafraichir=$_POST['champ_lie'];
}

?>


<?php 
	if (isset($_POST['edit'])) {

		$modifierActgen=$connexion->query("SELECT id_actgen, lib_actgen, descr_actgen
						FROM Activite_generique
						WHERE id_actgen =".$_POST['idactgen']);
		$modifierActgen = $modifierActgen->fetch(PDO::FETCH_OBJ);
			?>
			<div class="container-fluid">
			<legend>Modification d'une activité générique<div id="output" class="pull-right"></div></legend>
				<div class="container-fluid hero-unit">
					<form action="p_edition.php?form=act_gen" method="post" class="form-horizontal">
						<div class="span6">
								<div class="control-group">
									<label class="control-label" for="inputLibactgen">Libellé</label>
									<div class="controls">
										<input type="hidden" id="inputIdactgen" name="inputIdactgen" required="" value="<?php echo $modifierActgen->id_actgen;?>">
										<input type="text" id="inputLibactgen" name="inputLibactgen" required="" value="<?php echo $modifierActgen->lib_actgen;?>" >
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="inputDescractgen">Description</label>
									<div class="controls">
										<input type="text" id="inputDescractgen" name="inputDescractgen" required="" value="<?php echo $modifierActgen->descr_actgen;?>">
									</div>
								</div>
								
					
								<div class="control-group">
									<div class="controls">
										<button type="submit" name="modif" onMouseOver="show('Valider les modifications')" onMouseOut="hide()"  formaction=""  class="btn btn-success"><i class="icon-pencil icon-white"></i></button>
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
					btAlertMini("alert-success", "Succés : ", "Activité générique supprimée");
				}
			?>
			
			<legend> Liste des activités génériques <div id="output2" class="pull-right"></div></legend>
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
						<form action="form_act_gen.php" method="post">
							<td>
								<input class="span1" type="text" name="libactgen" placeholder="Libellé" required=""/>
							</td>
							<td>
								<input class="span2" type="text" name="descractgen" placeholder="Description" required=""/>
							</td>
							
							<td>
								<button type="submit" name="add" formaction="p_edition.php?form=act_gen" onMouseOver="show2('Créer une activité générique')" onMouseOut="hide2()" class="btn btn-success btn-mini"><i class="icon-ok icon-white"></i></button>
							</td>
						</form>
					</tr>
					<?php
					
								while( $obj = $ListeActgen->fetch() ){
					?>
					<!----Pop-UP des lien avec l'élement cliqué DEBUT--->
					<div class="modal fade" style="display:none" id="myModal_<?php echo $obj->id_actgen;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel">Activité générique: <?php echo $obj->lib_actgen;?></h4>
								</div>
								<div class="modal-body">
									<h4>Compétences liées:</h4>
									<ul class="liste_liens">
									<?php 
									$ListeCompLies=$connexion->query("SELECT C.id_competence, C.lib_competence 
																		FROM Competence C
																		JOIN Lien_activite_Competence L ON L.id_competence = C.id_competence
																		WHERE L.id_actgen=".$obj->id_actgen);
									$ListeCompLies->setFetchMode(PDO::FETCH_OBJ);
									while( $ListeCompLie = $ListeCompLies->fetch() ){
										echo'<li>
											<div class="div_align">
												<form action="p_edition.php?form=act_gen" method="post" name="casser_lien">
													<input type="hidden" name="table" value="Lien_activite_Competence"/>
													<input type="hidden" name="champ" value="'.$ListeCompLie->id_competence.'"/>
													<input type="hidden" name="champ_lie" value="'.$obj->id_actgen.'"/> 
													<button type="submit" name="casser_lien" formaction="p_edition.php?form=act_gen" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
												</form>
											</div>
											<div class="div_align">'.$ListeCompLie->lib_competence.'</div>
										</li>		
										';
										}
									?>
									</ul>
									<!----Formulaire d'ajout de lien entre actgen et competence DEBUT--->
									<form action="p_edition.php?form=act_gen" method="post">
										<input type="hidden" name="idactgen" value="<?php echo $obj->id_actgen; ?>"/>
										<?php
										$ListeCompNonLies=$connexion->query("SELECT C.id_competence, C.lib_competence  
																			FROM Competence C
																			WHERE C.id_competence NOT IN(SELECT C.id_competence 
																			FROM Competence C
																			JOIN Lien_activite_Competence L ON L.id_competence = C.id_competence
																			WHERE L.id_actgen=".$obj->id_actgen.")");
										$ListeCompNonLies->setFetchMode(PDO::FETCH_OBJ);
										?>
										<select name="inputLiaison"  class="selectpicker form-control">
											<?php
											while( $ListeCompNonLie = $ListeCompNonLies->fetch()){
												echo'<option value="'.$ListeCompNonLie->id_competence.'">'.$ListeCompNonLie->lib_competence.'</option>';
											}
											?>
										</select>
										<button type="submit" name="add_lien_actgen_comp" formaction="p_edition.php?form=act_gen" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
									</form> 
									<!----Formulaire d'ajout de lien entre actgen et competence FIN--->
									<h4>Activités terrains liées:</h4>
									<ul class="liste_liens">
										<?php 
										$ListeActterLies=$connexion->query("SELECT A.id_actter, A.lib_actter 
																			FROM Activite_terrain A
																			JOIN Lien_activite_generique_Activite_terrain L ON L.id_actter = A.id_actter
																			WHERE L.id_actgen=".$obj->id_actgen);
										$ListeActterLies->setFetchMode(PDO::FETCH_OBJ);
										while( $ListeActterLie = $ListeActterLies->fetch()){
											echo'<li>
												<div class="div_align">
													<form action="p_edition.php?form=act_gen" method="post" name="casser_lien">
														<input type="hidden" name="table" value="Lien_activite_generique_Activite_terrain"/>
														<input type="hidden" name="champ" value="'.$ListeActterLie->id_actter.'"/>
														<input type="hidden" name="champ_lie" value="'.$obj->id_actgen.'"/> 
														<button type="submit" name="casser_lien" formaction="p_edition.php?form=act_gen" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
													</form>
												</div>
												<div class="div_align">'.$ListeActterLie->lib_actter.'</div>
											</li>		
											';
											}
										?>
									</ul>
									<!----Formulaire d'ajout de lien entre actgen et Activite terrain DEBUT--->
									<form action="p_edition.php?form=act_gen" method="post">
										<input type="hidden" name="idactgen" value="<?php echo $obj->id_actgen; ?>"/>
										<?php
										$ListeActterNonLies=$connexion->query("SELECT A.id_actter, A.lib_actter
																			FROM Activite_terrain A
																			WHERE A.id_actter NOT IN(SELECT A.id_actter
																			FROM Activite_terrain A
																			JOIN Lien_activite_generique_Activite_terrain L ON L.id_actter = A.id_actter
																			WHERE L.id_actgen=".$obj->id_actgen.")");
										$ListeActterNonLies->setFetchMode(PDO::FETCH_OBJ);
										?>
										<select name="inputLiaison"  class="selectpicker form-control">
											<?php
											while( $ListeActterNonLie = $ListeActterNonLies->fetch()){
												echo'<option value="'.$ListeActterNonLie->id_actter.'">'.$ListeActterNonLie->lib_actter.'</option>';
											}
											?>
										</select>
										<button type="submit" name="add_lien_actgen_actter" formaction="p_edition.php?form=act_gen" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
									</form>
									<!----Formulaire d'ajout de lien entre actgen et Activite terrain FIN--->
									<h4>Emploi liés:</h4>
									<ul class="liste_liens">
									<?php 
									$ListeEmploiLies=$connexion->query("SELECT E.id_emploi, E.lib_emploi 
																		FROM Emploi E
																		JOIN Lien_emploi_Activite_generique L ON L.id_emploi = E.id_emploi
																		WHERE L.id_actgen=".$obj->id_actgen);
									$ListeEmploiLies->setFetchMode(PDO::FETCH_OBJ);
									while( $ListeEmploiLie = $ListeEmploiLies->fetch() ){
										echo'<li>
												<div class="div_align">
													<form action="p_edition.php?form=act_gen" method="post" name="casser_lien">
														<input type="hidden" name="table" value="Lien_emploi_Activite_generique"/>
														<input type="hidden" name="champ" value="'.$ListeEmploiLie->id_emploi.'"/>
														<input type="hidden" name="champ_lie" value="'.$obj->id_actgen.'"/> 
														<button type="submit" name="casser_lien" formaction="p_edition.php?form=act_gen" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
													</form>
												</div>
												<div class="div_align">'.$ListeEmploiLie->lib_emploi.'</div>
											</li>		
											';
										}
									?>
									</ul>
									<!----Formulaire d'ajout de lien entre actgen et emploi DEBUT--->
									<form action="p_edition.php?form=act_gen" method="post">
										<input type="hidden" name="idactgen" value="<?php echo $obj->id_actgen; ?>"/>
										<?php
										$ListeEmploiNonLies=$connexion->query("SELECT E.id_emploi, E.lib_emploi
																			FROM Emploi E
																			WHERE E.id_emploi NOT IN(SELECT E.id_emploi
																			FROM Emploi E
																			JOIN Lien_emploi_Activite_generique L ON L.id_emploi = E.id_emploi
																			WHERE L.id_actgen=".$obj->id_actgen.")"); 
										$ListeEmploiNonLies->setFetchMode(PDO::FETCH_OBJ);
										?>
										<select name="inputLiaison"  class="selectpicker form-control">
											<?php
											while( $ListeEmploiNonLie = $ListeEmploiNonLies->fetch()){
												echo'<option value="'.$ListeEmploiNonLie->id_emploi.'">'.$ListeEmploiNonLie->lib_emploi.'</option>';
											}
											?>
										</select>
										<button type="submit" name="add_lien_actgen_emp" formaction="p_edition.php?form=act_gen" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
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
						echo '<td><a onclick="details('.$obj->id_actgen.')">'.$obj->lib_actgen.'</a></td>';
						//echo '<td>'.$obj->lib_actgen.'</td>';
						echo '<td>'.$obj->descr_actgen.'</td>';
						echo '<td>
								<form action="p_edition.php?form=act_gen" method="post" name="suppr_actgen">
									<input type="hidden" name="idactgen" value="'.$obj->id_actgen.'"/>
									<button type="submit" name="edit" onMouseOver="show2(\'Modification de activité générique\')" onMouseOut="hide2()" formaction="p_edition.php?form=act_gen" class="btn btn-warning btn-mini"><i class="icon-cog icon-white"></i></button>
									<button type="submit" name="del" onclick="return(confirm(\'Veuillez confirmer la suppression\'))"  onMouseOver="show2(\'Suppression de activité générique\')" onMouseOut="hide2()" formaction="p_edition.php?form=act_gen" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i></button>
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
<!--<script type="text/javascript" src="../../includes/js/bootstrap.js"></script>-->