<?php
//on appel la fonction de connexion
$connexion =getDbConnexion();

//on r�cup la liste des elements existant
$ListePostes=$connexion->query("SELECT id_poste, libelle, description, occuper FROM Poste");
$ListePostes->setFetchMode(PDO::FETCH_OBJ);

/*en fonction de l'actions :*/

//si on supprime
if (isset($_POST['del'])) {
	$connexion->exec("DELETE FROM Poste WHERE id_poste =".$_POST['id_poste']);
	header('Location: p_edition.php?form=poste');   
	btAlertMini("alert-success", "Succès: ", "Poste supprimé avec succés");
}
	
//si on ajoute
if ( isset($_POST['add'])){

		if ($_POST['occuper']!=1){
		$_POST['occuper']=0;
	}
	$connexion->exec("INSERT INTO Poste SET libelle = '".$_POST['libelle']."', 
										description = '".$_POST['description']."',
										occuper = ".$_POST['occuper']);
										
	header('Location: p_edition.php?form=poste');  
	btAlertMini("alert-success", "succès: ", "Poste ajouté avec succés");								
}

//si on update
if (isset($_POST['modif'])){
	if ($_POST['inputOccuper']!=1){
		$_POST['inputOccuper']=0;
	}
	$connexion->exec("UPDATE Poste SET libelle = '".$_POST['inputLibelle']."',
									description = '".$_POST['inputDescription']."',
									occuper = '".$_POST['inputOccuper']."'
					WHERE id_poste = '".$_POST['inputId']."'");
	header('Location: p_edition.php?form=poste');   
	btAlertMini("alert-success", "succès: ", "Poste modifié avec succés");
}


// si on ajoute un lien entre un Poste et un pp:
if (isset($_POST['add_lien_pp_poste'])){
	$connexion->exec("INSERT INTO Lien_poste_Profil_poste SET id_poste = '".$_POST['idposte']."', id_profil_poste= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idposte'];
	//header('Location: p_edition.php?form=poste');   
							
}

// si on ajoute un lien entre un Poste et une activit� terrain:
if (isset($_POST['add_lien_poste_actter'])){
	$connexion->exec("INSERT INTO Lien_poste_Activite_terrain SET id_poste = '".$_POST['idposte']."', id_actter= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idposte'];
	//header('Location: p_edition.php?form=poste');  					
}

//si on supprime un lien
if (isset($_POST['casser_lien'])){
	//on récupere les noms des champs de la table liens
	switch ($_POST['table']) {
	    case 'Lien_poste_Profil_poste':
	        $connexion->exec("DELETE FROM Lien_poste_Profil_poste WHERE id_profil_poste =".$_POST['champ']." and id_poste=".$_POST['champ_lie']);
			break;
	    case 'Lien_poste_Activite_terrain':
	        $connexion->exec("DELETE FROM Lien_poste_Activite_terrain WHERE id_poste =".$_POST['champ_lie']." and id_actter=".$_POST['champ']);
			break;
	}
	$rafraichir=$_POST['champ_lie'];
}
?>

<?php 
if (isset($_POST['edit'])&& $_POST['id_poste']) {
	$modifierPostes=$connexion->query("SELECT id_poste, libelle, description, occuper 
					FROM Poste
					WHERE Poste.id_poste = '".$_POST['id_poste']."'");
	while( $modifierPoste = $modifierPostes->fetch(PDO::FETCH_OBJ)){
		?>
		<div class="container-fluid">
			<legend>Modification d'un poste<div id="output" class="pull-right"></div></legend>
			<div class="container-fluid hero-unit">
				<form action="p_edition.php?form=poste" method="post" class="form-horizontal">
					<div class="span6">
							<div class="control-group">
								<label class="control-label" for="inputLibelle">Libellé</label>
								<div class="controls">
									<input type="hidden" id="inputId" name="inputId" required="" value="<?php echo $modifierPoste->id_poste;?>">
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
							    	<?php 
										if ($modifierPoste->occuper==1){
											?>
												<input type="checkbox" id="inputOccuper" name="inputOccuper"  checked="checked" value="1">
											<?php
										}
										else{
											?>
												<input type="checkbox" id="inputOccuper" name="inputOccuper" value="1">
											<?php
										}
									?>
	  							</div>
	  						</div>
							<div class="control-group">
								<div class="controls">
									<button type="submit" name="modif" onMouseOver="show('Valider les modifications')" onMouseOut="hide()"  formaction="p_edition.php?form=poste"  class="btn btn-success"><i class="icon-pencil icon-white"></i></button>
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

<?php 
	if (!isset($_POST['edit'])) {
		?>
		<div class="container-fluid">
			<?php 
				if (isset($_POST['del'])) {
					btAlertMini("alert-success", "succès: ", "Poste supprimé");
				}
			?>
			<legend> Liste des postes <div id="output2" class="pull-right"></div></legend>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Libellé</th>
						<th>Description</th>
						<th>Occupé</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<form action="p_edition.php?form=poste" method="post">
							<td>
								<input class="span1" type="text" name="libelle" placeholder="Libellé" required=""/>
							</td>
								<td>
							<input class="span2" type="text" name="description" placeholder="Description" required=""/>
							</td>
							<td>
								<div class="checkbox"> 
									<label>
										<input type="checkbox" name="occuper" value="1"> Occupé
							    	</label>
		  						</div>
							</td>
							<td>
								<button type="submit" name="add" formaction="p_edition.php?form=poste" onMouseOver="show2('Créer un poste')" onMouseOut="hide2()" class="btn btn-success btn-mini"><i class="icon-ok icon-white"></i></button>
							</td>
						</form>
					</tr>
				<?php
					while( $obj = $ListePostes->fetch() ){
						?>
						<!----Pop-UP des lien avec l'�lement cliqu� DEBUT--->
						<div style="display: none" class="modal fade" id="myModal_<?php echo $obj->id_poste;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Poste: <?php echo $obj->libelle;?></h4>
									</div>
									<div class="modal-body">
										<h4>Profil de postes liés </h4>
										<ul class="liste_liens">
										<?php 
										$ListeProPosteLies=$connexion->query("SELECT PP.id_profil_poste, PP.lib_profil_poste 
																			FROM Profil_poste PP
																			JOIN Lien_poste_Profil_poste L ON L.id_profil_poste = PP.id_profil_poste
																			WHERE L.id_poste=".$obj->id_poste);
										$ListeProPosteLies->setFetchMode(PDO::FETCH_OBJ);
										while( $ListeProPosteLie = $ListeProPosteLies->fetch() ){
											echo'<li>
												<div class="div_align">
													<form action="p_edition.php?form=poste" method="post" name="casser_lien">
														<input type="hidden" name="table" value="Lien_poste_Profil_poste"/>
														<input type="hidden" name="champ" value="'.$ListeProPosteLie->id_profil_poste.'"/>
														<input type="hidden" name="champ_lie" value="'.$obj->id_poste.'"/> 
														<button type="submit" name="casser_lien" formaction="p_edition.php?form=poste" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
													</form>
												</div>
												<div class="div_align">'.$ListeProPosteLie->lib_profil_poste.'</div>
											</li>		
											';
											}
										?>
										</ul>
										<!----Formulaire d'ajout de lien entre Poste et PP DEBUT--->
										<form action="p_edition.php?form=poste" method="post">
											<input type="hidden" name="idposte" value="<?php echo $obj->id_poste; ?>"/>
											
											<?php
											$ListeProPosteNonLies=$connexion->query("SELECT PP.id_profil_poste, PP.lib_profil_poste 
																				FROM Profil_poste PP
																				WHERE PP.id_profil_poste NOT IN(SELECT PP.id_profil_poste 
																				FROM Profil_poste PP
																				JOIN Lien_poste_Profil_poste L ON L.id_profil_poste = PP.id_profil_poste
																				WHERE L.id_poste=".$obj->id_poste.")");
											$ListeProPosteNonLies->setFetchMode(PDO::FETCH_OBJ);
											//var_dump($ListeProPosteNonLies);
											?>
											
											<select name="inputLiaison"  class="selectpicker form-control">
												<?php
												while( $ListeProPosteNonLie = $ListeProPosteNonLies->fetch()){
													echo'<option value="'.$ListeProPosteNonLie->id_profil_poste.'">'.$ListeProPosteNonLie->lib_profil_poste.'</option>';
												}
												?>
											</select>
											<button type="submit" name="add_lien_pp_poste" formaction="p_edition.php?form=poste" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
										</form>
										<!----Formulaire d'ajout de lien entre Poste et PP FIN--->	
										
										<h4>Activités terrains liées:</h4>
										<ul class="liste_liens">
											<?php 
											$ListeActterLies=$connexion->query("SELECT A.id_actter, A.lib_actter 
																				FROM Activite_terrain A
																				JOIN Lien_poste_Activite_terrain L ON L.id_actter = A.id_actter
																				WHERE L.id_poste=".$obj->id_poste);
											$ListeActterLies->setFetchMode(PDO::FETCH_OBJ);
											$table_ref='Lien_poste_Activite_terrain';
											while( $ListeActterLie = $ListeActterLies->fetch()){
												echo'<li>
													<div class="div_align">
														<form action="p_edition.php?form=poste" method="post" name="casser_lien">
															<input type="hidden" name="table" value="Lien_poste_Activite_terrain"/>
															<input type="hidden" name="champ" value="'.$ListeActterLie->id_actter.'"/>
															<input type="hidden" name="champ_lie" value="'.$obj->id_poste.'"/> 
															<button type="submit" name="casser_lien" formaction="p_edition.php?form=poste" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
														</form>
													</div>
													<div class="div_align">'.$ListeActterLie->lib_actter.'</div>
												</li>		
												';
												}
											?>
										</ul>
										<!----Formulaire d'ajout de lien entre Poste et Activite terrain DEBUT--->				
											<form action="p_edition.php?form=poste" method="post">
												<input type="hidden" name="idposte" value="<?php echo $obj->id_poste; ?>"/>
													<?php
													$ListeActterNonLies=$connexion->query("SELECT A.id_actter, A.lib_actter
																				FROM Activite_terrain A
																				WHERE A.id_actter NOT IN(SELECT A.id_actter
																				FROM Activite_terrain A
																				JOIN Lien_poste_Activite_terrain L ON L.id_actter = A.id_actter
																				WHERE L.id_poste=".$obj->id_poste.")");
													$ListeActterNonLies->setFetchMode(PDO::FETCH_OBJ);
													?>
													<select name="inputLiaison"  class="selectpicker form-control">
													<?php
													while( $ListeActterNonLie = $ListeActterNonLies->fetch()){
														echo'<option value="'.$ListeActterNonLie->id_actter.'">'.$ListeActterNonLie->lib_actter.'</option>';
													}
													?>
													</select>
													<button type="submit" name="add_lien_poste_actter" formaction="p_edition.php?form=poste" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
													</form>
										<!----Formulaire d'ajout de lien entre Poste et Activite terrain FIN--->																				
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
							//echo '<td>'.$obj->id.'</td>';
							echo '<td><a onclick="details('.$obj->id_poste.')">'.$obj->libelle.'</a></td>';
							echo '<td>'.$obj->description.'</td>';
							if ($obj->occuper=='1'){
								echo '<td>Occupé</td>';
							}
							else{
								echo '<td>Vacant</td>';
							}
							//echo '<td>'.$obj->occuper.'</td>';
							echo '<td>
									<form action="p_edition.php?form=poste" method="post" name="suppr_poste">
										<input type="hidden" name="id_poste" value="'.$obj->id_poste.'"/>
										<button type="submit" name="edit" onMouseOver="show2(\'Modification de poste\')" onMouseOut="hide2()" formaction="p_edition.php?form=poste" class="btn btn-warning btn-mini"><i class="icon-cog icon-white"></i></button>
										<button type="submit" name="del" onclick="return(confirm(\'Veuillez confirmer la suppression\'))"  onMouseOver="show2(\'Suppression de poste\')" onMouseOut="hide2()" formaction="p_edition.php?form=poste" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i></button>
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