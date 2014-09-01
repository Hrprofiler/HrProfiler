<?php
//on appel la fonction de connexion
$connexion =getDbConnexion();

//on r�cup la liste des elements existant
$ListeCompetences=$connexion->query("SELECT id_competence, lib_competence, descr_competence, type_competence FROM Competence");
$ListeCompetences->setFetchMode(PDO::FETCH_OBJ);

/*en fonction de l'actions :*/

//si on supprime
if (isset($_POST['del'])) {
	$connexion->exec("DELETE FROM Competence WHERE id_competence =".$_POST['idcompetence']);
	header('Location: p_edition.php?form=comp');   
	btAlertMini("alert-success", "Succés : ", "Compétence supprim�e avec Succés");
}
	
//si on ajoute
if ( isset($_POST['add'])){
	$connexion->exec("INSERT INTO Competence SET lib_competence = '".$_POST['libCompetence']."',
										descr_competence = '".$_POST['descrCompetence']."',
										type_competence = '".$_POST['typeCompetence']."'");
	header('Location: p_edition.php?form=comp');  
	btAlertMini("alert-success", "Succés : ", "Compétence ajouté avec Succés");								
}

//si on update
if (isset($_POST['modif'])){
	var_dump($_POST['inputLibcompetence']);
	var_dump($_POST['inputDescrcompetence']);
	var_dump($_POST['inputTypecomp']);
	
	$connexion->exec("UPDATE Competence SET lib_competence = '".$_POST['inputLibcompetence']."',
									descr_competence = '".$_POST['inputDescrcompetence']."',
									type_competence = '".$_POST['inputTypecomp']."'
					WHERE id_competence = '".$_POST['inputIdcompetence']."'");
	header('Location: p_edition.php?form=comp');   
	btAlertMini("alert-success", "Succés : ", "Compétence modifiée avec Succés");
}

// si on ajoute un lien entre une competence et un portefeuille:
if (isset($_POST['add_lien_comp_port'])){
	$connexion->exec("INSERT INTO Lien_competence_portefeuille SET id_competence = '".$_POST['idcompetence']."', id_portefeuille= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idcompetence'];
	//header('Location: p_edition.php?form=comp');  
}

// si on ajoute un lien entre une et une activit� generique:
if (isset($_POST['add_lien_comp_actgen'])){
	$connexion->exec("INSERT INTO Lien_activite_Competence SET id_competence = '".$_POST['idcompetence']."', id_actgen= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idcompetence'];
	//header('Location: p_edition.php?form=comp');  					
}

// si on ajoute un lien entre une et une activit� terrain:
if (isset($_POST['add_lien_comp_actter'])){
	$connexion->exec("INSERT INTO Lien_activite_Competence SET id_competence = '".$_POST['idcompetence']."', id_actter= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idcompetence'];
	//header('Location: p_edition.php?form=comp');  					
}

//si on supprime un lien
if (isset($_POST['casser_lien'])){
	
	//on récupere les noms des champs de la table liens
	switch ($_POST['table']) {	
	    case 'Lien_competence_portefeuille':
	        $connexion->exec("DELETE FROM Lien_competence_portefeuille WHERE id_portefeuille =".$_POST['champ']." and id_competence=".$_POST['champ_lie']);
			break;
	    case 'Lien_activite_Competence_actter':
	        $connexion->exec("DELETE FROM Lien_activite_Competence WHERE id_actter =".$_POST['champ']." and id_competence=".$_POST['champ_lie']);
			break;
		case 'Lien_activite_Competence_actgen':
	        $connexion->exec("DELETE FROM Lien_activite_Competence WHERE id_actgen =".$_POST['champ']." and id_competence=".$_POST['champ_lie']);
			break;
	}
	$rafraichir=$_POST['champ_lie'];
}
?>
<?php 
	if (isset($_POST['edit'])) {
		$modifierCompetence=$connexion->query("SELECT id_competence, lib_competence, descr_competence,type_competence
						FROM Competence
						WHERE id_competence =".$_POST['idcompetence']);
		$modifierCompetence = $modifierCompetence->fetch(PDO::FETCH_OBJ);
			?>		
<div class="container-fluid">
	<legend>Modification d'une compétence<div id="output" class="pull-right"></div></legend>
	<div class="container-fluid hero-unit">
		<form action="p_edition.php?form=comp" method="post" class="form-horizontal">
			<div class="span6">
				<div class="control-group">
					<label class="control-label" for="inputLibcompetence">Libellé</label>
					<div class="controls">
						<input type="hidden" id="inputIdcompetence" name="inputIdcompetence" required="" value="<?php echo $modifierCompetence->id_competence;?>">
						<input type="text" id="inputLibcompetence" name="inputLibcompetence" required="" value="<?php echo $modifierCompetence->lib_competence;?>" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputDescrcompetence">Description</label>
					<div class="controls">
						<input type="text" id="inputDescrcompetence" name="inputDescrcompetence" required="" value="<?php echo $modifierCompetence->descr_competence;?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputTypecomp">Type Compétence</label>
					<div class="controls">
						<select name="inputTypecomp"  class="selectpicker form-control">
							<?php
								if ($modifierCompetence->type_competence == 'Compétence'){
									echo'<option value="Compétence" selected="selected">Compétence</option>';
									echo'<option value="Savoir-faire" >Savoir-faire</option>';
								}
								else{
									echo'<option value="Compétence">Compétence</option>';
									echo'<option value="Savoir-faire" selected="selected">Savoir-faire</option>';
								} 
							?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" name="modif" onMouseOver="show('Valider les modifications')" onMouseOut="hide()"  formaction="p_edition.php?form=comp"  class="btn btn-success"><i class="icon-pencil icon-white"></i></button>
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
					btAlertMini("alert-success", "Succés : ", "Compétence supprimée");
						}
					?>
	<legend> Liste des Compétences <div id="output2" class="pull-right"></div></legend>
	<table class="table table-hover">
		<thead>
			<tr>
			<th>Libellé</th>
			<th>Description</th>
			<th>Type</th>
			<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<form action="p_edition.php?form=comp" method="post">
					<td>
						<input class="span2" type="text" name="libCompetence" placeholder="Libellé" required=""/>
					</td>
					<td>
						<input class="span2" type="text" name="descrCompetence" placeholder="Description" required=""/>
					</td>
					<td>
						<div class="control-group">
							<div class="controls">
								<select name="typeCompetence"  class="selectpicker form-control span2">
									<option value="Compétence" selected="selected">Compétence</option>
									<option value="Savoir-faire" >Savoir-faire</option>
								</select>
							</div>
						</div>
					</td> 
					<td>
						<button type="submit" name="add" formaction="p_edition.php?form=comp" onMouseOver="show2('Créer Compétence')" onMouseOut="hide2()" class="btn btn-success btn-mini"><i class="icon-ok icon-white"></i></button>
					</td>
				</form>
			</tr>
			<?php

				while( $obj = $ListeCompetences->fetch() ){

				?>
			<!----Pop-UP des lien avec l'�lement cliqu� DEBUT--->
					
					<div class="modal fade" style="display:none" id="myModal_<?php echo $obj->id_competence;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title" id="myModalLabel">Compétence: <?php echo $obj->lib_competence;?></h4>
								</div>
								<div class="modal-body">
									<h4>Portefeuille liés:</h4>
									<ul class="liste_liens">
									<?php
									$ListePortefeuilleLies=$connexion->query("SELECT P.id_portefeuille, P.lib_portefeuille 
																		FROM Portefeuille P
																		JOIN Lien_competence_portefeuille L ON L.id_portefeuille = P.id_portefeuille
																		WHERE L.id_competence=".$obj->id_competence);
									$ListePortefeuilleLies->setFetchMode(PDO::FETCH_OBJ);
									while( $ListePortefeuilleLie = $ListePortefeuilleLies->fetch() ){
										echo'<li>
											<div class="div_align">
												<form action="p_edition.php?form=comp" method="post" name="casser_lien">
													<input type="hidden" name="table" value="Lien_competence_portefeuille"/>
													<input type="hidden" name="champ" value="'.$ListePortefeuilleLie->id_portefeuille.'"/>
													<input type="hidden" name="champ_lie" value="'.$obj->id_competence.'"/> 
													<button type="submit" name="casser_lien" formaction="p_edition.php?form=comp" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
												</form>
											</div>
											<div class="div_align">'.$ListePortefeuilleLie->lib_portefeuille.'</div>
										</li>		
										';
										}
									?>
									</ul>
									<!----Formulaire d'ajout de lien entre Compétence et Portefeuille DEBUT--->
										<form action="p_edition.php?form=comp" method="post">
											<input type="hidden" name="idcompetence" value="<?php echo $obj->id_competence; ?>"/>
											<?php
											$ListePortefeuilleNonLies=$connexion->query("SELECT P.id_portefeuille, P.lib_portefeuille 
																				FROM Portefeuille P 
																				WHERE P.id_portefeuille NOT IN(SELECT P.id_portefeuille 
																				FROM Portefeuille P
																				JOIN Lien_competence_portefeuille L ON L.id_portefeuille = P.id_portefeuille
																				WHERE L.id_competence=".$obj->id_competence.")");
											$ListePortefeuilleNonLies->setFetchMode(PDO::FETCH_OBJ);
											?>
											<select name="inputLiaison"  class="selectpicker form-control">
												<?php
												while( $ListePortefeuilleNonLie = $ListePortefeuilleNonLies->fetch()){
													echo'<option value="'.$ListePortefeuilleNonLie->id_portefeuille.'">'.$ListePortefeuilleNonLie->lib_portefeuille.'</option>';
												}
												?>
											</select>
											<button type="submit" name="add_lien_comp_port" formaction="p_edition.php?form=comp" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
										</form>
									<!----Formulaire d'ajout de lien entre competence et Portefeuille FIN--->
			
									<h4>Activités terrains liées:</h4>
									<ul class="liste_liens">
										<?php 
										$ListeActterLies=$connexion->query("SELECT A.id_actter, A.lib_actter 
																			FROM Activite_terrain A
																			JOIN Lien_activite_Competence L ON L.id_actter = A.id_actter
																			WHERE L.id_competence=".$obj->id_competence);
										$ListeActterLies->setFetchMode(PDO::FETCH_OBJ);
										while( $ListeActterLie = $ListeActterLies->fetch()){
											echo'<li>
												<div class="div_align">
													<form action="p_edition.php?form=comp" method="post" name="casser_lien">
														<input type="hidden" name="table" value="Lien_activite_Competence_actter"/>
														<input type="hidden" name="champ" value="'.$ListeActterLie->id_actter.'"/>
														<input type="hidden" name="champ_lie" value="'.$obj->id_competence.'"/> 
														<button type="submit" name="casser_lien" formaction="p_edition.php?form=comp" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
													</form>
												</div>
												<div class="div_align">'.$ListeActterLie->lib_actter.'</div>
											</li>		
											';
											}
										?>
									</ul>
										<!----Formulaire d'ajout de lien entre competence et Activite terrain DEBUT--->
										<form action="p_edition.php?form=comp" method="post">
											<input type="hidden" name="idcompetence" value="<?php echo $obj->id_competence; ?>"/>
											<?php
											$ListeActterNonLies=$connexion->query("SELECT A.id_actter, A.lib_actter
																				FROM Activite_terrain A
																				WHERE A.id_actter NOT IN(SELECT A.id_actter
																				FROM Activite_terrain A
																				JOIN Lien_activite_Competence L ON L.id_actter = A.id_actter
																				WHERE L.id_competence=".$obj->id_competence.")");
											$ListeActterNonLies->setFetchMode(PDO::FETCH_OBJ);
											?>
											<select name="inputLiaison"  class="selectpicker form-control">
												<?php
												while( $ListeActterNonLie = $ListeActterNonLies->fetch()){
													echo'<option value="'.$ListeActterNonLie->id_actter.'">'.$ListeActterNonLie->lib_actter.'</option>';
												}
												?>
											</select>
											<button type="submit" name="add_lien_comp_actter" formaction="p_edition.php?form=comp" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
										</form>
									<!----Formulaire d'ajout de lien entre competence et Activite terrain FIN--->
									
										<h4>Activités generiques liées:</h4>
									<ul class="liste_liens">
										<?php 
										$ListeActgenLies=$connexion->query("SELECT A.id_actgen, A.lib_actgen 
																			FROM Activite_generique A
																			JOIN Lien_activite_Competence L ON L.id_actgen = A.id_actgen
																			WHERE L.id_competence=".$obj->id_competence);
										$ListeActgenLies->setFetchMode(PDO::FETCH_OBJ);
										while( $ListeActgenLie = $ListeActgenLies->fetch()){
											echo'<li>
													<div class="div_align">
														<form action="p_edition.php?form=comp" method="post" name="casser_lien">
															<input type="hidden" name="table" value="Lien_activite_Competence_actgen"/>
															<input type="hidden" name="champ" value="'.$ListeActgenLie->id_actgen.'"/>
															<input type="hidden" name="champ_lie" value="'.$obj->id_competence.'"/> 
															<button type="submit" name="casser_lien" formaction="p_edition.php?form=comp" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
														</form>
													</div>
													<div class="div_align">'.$ListeActgenLie->lib_actgen.'</div>
												</li>		
												';
											}
										?>
									</ul>
										<!----Formulaire d'ajout de lien entre competence et Activite generique DEBUT--->
										<form action="p_edition.php?form=comp" method="post">
											<input type="hidden" name="idcompetence" value="<?php echo $obj->id_competence; ?>"/>
											<?php
											$ListeActgenNonLies=$connexion->query("SELECT A.id_actgen, A.lib_actgen
																				FROM Activite_generique A
																				WHERE A.id_actgen NOT IN(SELECT A.id_actgen
																				FROM Activite_generique A
																				JOIN Lien_activite_Competence L ON L.id_actgen = A.id_actgen
																				WHERE L.id_competence=".$obj->id_competence.")");
											$ListeActgenNonLies->setFetchMode(PDO::FETCH_OBJ);
											?>
											<select name="inputLiaison"  class="selectpicker form-control">
												<?php
												while( $ListeActgenNonLie = $ListeActgenNonLies->fetch()){
													echo'<option value="'.$ListeActgenNonLie->id_actgen.'">'.$ListeActgenNonLie->lib_actgen.'</option>';
												}
												?>
											</select>
											<button type="submit" name="add_lien_comp_actgen" formaction="p_edition.php?form=comp" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
										</form>
									<!----Formulaire d'ajout de lien entre competence et Activite generique FIN--->
									</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-success" data-dismiss="modal">Fermer</button>
								</div>
							</div>
						</div>
					</div>
					<!----Pop-UP des lien avec l'�lement cliqu� FIN--->
			
				<?php
				echo '<tr>';
				echo '<td><a onclick="details('.$obj->id_competence.')">'.$obj->lib_competence.'</a></td>';
				echo '<td>'.$obj->descr_competence.'</td>';
				echo '<td>'.$obj->type_competence.'</td>';
				echo '<td>
						<form action="p_edition.php?form=comp" method="post" name="suppr_competence">
							<input type="hidden" name="idcompetence" value="'.$obj->id_competence.'"/>
							<button type="submit" name="edit" onMouseOver="show2(\'Modification de Compétence\')" onMouseOut="hide2()" formaction="p_edition.php?form=comp" class="btn btn-warning btn-mini"><i class="icon-cog icon-white"></i></button>
							<button type="submit" name="del" onclick="return(confirm(\'Veuillez confirmer la suppression\'))"  onMouseOver="show2(\'Suppression de competence\')" onMouseOut="hide2()" formaction="p_edition.php?form=comp" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i></button>
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