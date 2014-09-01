<?php
//on appel la fonction de connexion
$connexion =getDbConnexion();

//on récup la liste des elements existant
$ListeProfilpostes=$connexion->query("SELECT id_profil_poste, lib_profil_poste FROM Profil_poste");
$ListeProfilpostes->setFetchMode(PDO::FETCH_OBJ);

/*en fonction de l'actions :*/

//si on supprime
if (isset($_POST['del'])) {
	$connexion->exec("DELETE FROM Profil_poste WHERE id_profil_poste =".$_POST['idpp']);
	header('Location: p_edition.php?form=pro_post');   
	btAlertMini("alert-success", "Succès : ", "Profil de poste supprimé avec succés");
}
	
//si on ajoute
if ( isset($_POST['add'])){

	$connexion->exec("INSERT INTO Profil_poste SET lib_profil_poste = '".$_POST['libpp']."'");

	header('Location: p_edition.php?form=pro_post');  
	btAlertMini("alert-success", "Succès : ", "Profil de poste ajouté avec succés");								
}

//si on update
if (isset($_POST['modif'])){
	
	$connexion->exec("UPDATE Profil_poste SET lib_profil_poste = '".$_POST['inputLibpp']."'
									
					WHERE id_profil_poste = '".$_POST['inputIdpp']."'");
					
	header('Location: p_edition.php?form=pro_post');   
	btAlertMini("alert-success", "Succès : ", "Profil de poste modifié avec succés");
}
// si on ajoute un lien entre un PP et un poste:
if (isset($_POST['add_lien_pp_poste'])){
	$connexion->exec("INSERT INTO Lien_poste_Profil_poste SET id_profil_poste = '".$_POST['idpp']."', id_poste= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idpp'];
	//header('Location: p_edition.php?form=pro_post');    
							
}

// si on ajoute un lien entre un PP et une activité terrain:
if (isset($_POST['add_lien_pp_actter'])){
	$connexion->exec("INSERT INTO Lien_profil_poste_Activite_terrain SET id_profil_poste = '".$_POST['idpp']."', id_actter= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idpp'];
	//header('Location: p_edition.php?form=pro_post');  					
}

// si on ajoute un lien entre un PP et un emploi:
if (isset($_POST['add_lien_pp_emploi'])){
	$connexion->exec("INSERT INTO Lien_emploi_Profil_poste SET id_profil_poste = '".$_POST['idpp']."', id_emploi= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idpp'];
	//header('Location: p_edition.php?form=pro_post');  					
}

//si on supprime un lien
if (isset($_POST['casser_lien'])){
	//on récupere les noms des champs de la table liens
	switch ($_POST['table']) {
	    case 'Lien_poste_Profil_poste':
	        $connexion->exec("DELETE FROM Lien_poste_Profil_poste WHERE id_profil_poste =".$_POST['champ_lie']." and id_poste=".$_POST['champ']);
			break;	
	    case 'Lien_profil_poste_Activite_terrain':
	        $connexion->exec("DELETE FROM Lien_profil_poste_Activite_terrain WHERE id_profil_poste =".$_POST['champ_lie']." and id_actter=".$_POST['champ']);
			break;
		case 'Lien_emploi_Profil_poste':
	        $connexion->exec("DELETE FROM Lien_emploi_Profil_poste WHERE id_emploi =".$_POST['champ']." and id_profil_poste=".$_POST['champ_lie']);
			break;
	}
	$rafraichir=$_POST['champ_lie'];
}
?>

<?php 
if (isset($_POST['edit']) && $_POST['idpp']) {
	$modifierProfilposte=$connexion->query("SELECT id_profil_poste, lib_profil_poste
					FROM Profil_poste
					WHERE Profil_poste.id_profil_poste ='".$_POST['idpp']."'");
	$modifierProfilposte=$modifierProfilposte->fetch(PDO::FETCH_OBJ);
	?>	
	<div class="container-fluid">
	<legend>Modification d'un profil de poste<div id="output" class="pull-right"></div></legend>
		<div class="container-fluid hero-unit">
			<form action="p_edition.php?form=pro_post" method="post" class="form-horizontal">
				<div class="span6">
					<div class="control-group">
						<label class="control-label" for="inputLibpp">Libellé</label>
						<div class="controls">
							<input type="hidden" id="inputIdpp" name="inputIdpp" required="" value="<?php echo $modifierProfilposte->id_profil_poste;?>">
							<input type="text" id="inputLibpp" name="inputLibpp" required="" value="<?php echo $modifierProfilposte->lib_profil_poste;?>">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button type="submit" name="modif" onMouseOver="show('Valider les modifications')" onMouseOut="hide()"  formaction="p_edition.php?form=pro_post"  class="btn btn-success"><i class="icon-pencil icon-white"></i></button>
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
				btAlertMini("alert-success", "Succés : ", "Profil de poste supprimé");
			}
		?>
		<legend> Liste des profils de poste <div id="output2" class="pull-right"></div></legend>
		<table class="table table-hover">
			<thead>
				<tr>
				<th>Libellé</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<form action="p_edition.php?form=pro_post" method="post">
						<td><input class="span1" type="text" name="libpp" placeholder="Libellé" required=""/></td>
						<td>
							<button type="submit" name="add" formaction="p_edition.php?form=pro_post" onMouseOver="show2('Créer un profil de poste')" onMouseOut="hide2()" class="btn btn-success btn-mini"><i class="icon-ok icon-white"></i></button>
						</td>
					</form>
				</tr>
			<?php
				while( $obj = $ListeProfilpostes->fetch()){
					?>
					<!----Pop-UP des lien avec l'élement cliqué DEBUT--->
					<div class="modal fade" style="display:none" id="myModal_<?php echo $obj->id_profil_poste;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title" id="myModalLabel">Profil de poste: <?php echo $obj->lib_profil_poste;?></h4>
								</div>
								<div class="modal-body">
									<h4>Postes liés:</h4>
									<ul class="liste_liens">
									<?php 
									$ListePosteLies=$connexion->query("SELECT P.id_poste, P.libelle 
																		FROM Poste P
																		JOIN Lien_poste_Profil_poste L ON L.id_poste = P.id_poste
																		WHERE L.id_profil_poste=".$obj->id_profil_poste);
									$ListePosteLies->setFetchMode(PDO::FETCH_OBJ);
									while( $ListePosteLie = $ListePosteLies->fetch() ){
										echo'<li>
												<div class="div_align">
													<form action="p_edition.php?form=pro_post" method="post" name="casser_lien">
														<input type="hidden" name="table" value="Lien_poste_Profil_poste"/>
														<input type="hidden" name="champ" value="'.$ListePosteLie->id_poste.'"/>
														<input type="hidden" name="champ_lie" value="'.$obj->id_profil_poste.'"/> 
														<button type="submit" name="casser_lien" formaction="p_edition.php?form=pro_post" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
													</form>
												</div>
												<div class="div_align">'.$ListePosteLie->libelle.'</div>
											</li>		
											';
										}
									?>
									</ul>
									<!----Formulaire d'ajout de lien entre PP et Poste DEBUT--->
										<form action="p_edition.php?form=pro_post" method="post">
											<input type="hidden" name="idpp" value="<?php echo $obj->id_profil_poste; ?>"/>
											<?php
											$ListePosteNonLies=$connexion->query("SELECT P.id_poste, P.libelle 
																				FROM Poste P 
																				WHERE P.id_poste NOT IN(SELECT P.id_poste 
																				FROM Poste P
																				JOIN Lien_poste_Profil_poste L ON L.id_poste = P.id_poste
																				WHERE L.id_profil_poste=".$obj->id_profil_poste.")");
											$ListePosteNonLies->setFetchMode(PDO::FETCH_OBJ);
											?>
											<select name="inputLiaison"  class="selectpicker form-control">
												<?php
												while( $ListePosteNonLie = $ListePosteNonLies->fetch()){
													echo'<option value="'.$ListePosteNonLie->id_poste.'">'.$ListePosteNonLie->libelle.'</option>';
												}
												?>
											</select>
											<button type="submit" name="add_lien_pp_poste" formaction="p_edition.php?form=pro_post" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
										</form>
									<!----Formulaire d'ajout de lien entre PP et Poste FIN--->
									<h4>Activités terrains liées:</h4>
									<ul class="liste_liens">
										<?php 
										$ListeActterLies=$connexion->query("SELECT A.id_actter, A.lib_actter 
																			FROM Activite_terrain A
																			JOIN Lien_profil_poste_Activite_terrain L ON L.id_actter = A.id_actter
																			WHERE L.id_profil_poste=".$obj->id_profil_poste);
										$ListeActterLies->setFetchMode(PDO::FETCH_OBJ);
										while( $ListeActterLie = $ListeActterLies->fetch()){
											echo'<li>
													<div class="div_align">
														<form action="p_edition.php?form=poste" method="post" name="casser_lien">
															<input type="hidden" name="table" value="Lien_profil_poste_Activite_terrain"/>
															<input type="hidden" name="champ" value="'.$ListeActterLie->id_actter.'"/>
															<input type="hidden" name="champ_lie" value="'.$obj->id_profil_poste.'"/> 
															<button type="submit" name="casser_lien" formaction="p_edition.php?form=pro_post" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
														</form>
													</div>
													<div class="div_align">'.$ListeActterLie->lib_actter.'</div>
												</li>		
												';
											}
										?>
									</ul>
									<!----Formulaire d'ajout de lien entre PP et Activite terrain DEBUT--->
										<form action="p_edition.php?form=pro_post" method="post">
											<input type="hidden" name="idpp" value="<?php echo $obj->id_profil_poste; ?>"/>
											<?php
											$ListeActterNonLies=$connexion->query("SELECT A.id_actter, A.lib_actter
																				FROM Activite_terrain A
																				WHERE A.id_actter NOT IN(SELECT A.id_actter
																				FROM Activite_terrain A
																				JOIN Lien_profil_poste_Activite_terrain L ON L.id_actter = A.id_actter
																				WHERE L.id_profil_poste=".$obj->id_profil_poste.")");
											$ListeActterNonLies->setFetchMode(PDO::FETCH_OBJ);
											?>
											<select name="inputLiaison"  class="selectpicker form-control">
												<?php
												while( $ListeActterNonLie = $ListeActterNonLies->fetch()){
													echo'<option value="'.$ListeActterNonLie->id_actter.'">'.$ListeActterNonLie->lib_actter.'</option>';
												}
												?>
											</select>
											<button type="submit" name="add_lien_pp_actter" formaction="p_edition.php?form=pro_post" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
										</form>
									<!----Formulaire d'ajout de lien entre PP et Activite terrain FIN--->
									<h4>Emploi liés:</h4>
									<ul class="liste_liens">
									<?php 
									$ListeEmploiLies=$connexion->query("SELECT E.id_emploi, E.lib_emploi 
																		FROM Emploi E
																		JOIN Lien_emploi_Profil_poste L ON L.id_emploi = E.id_emploi
																		WHERE L.id_profil_poste=".$obj->id_profil_poste);
									$ListeEmploiLies->setFetchMode(PDO::FETCH_OBJ);
									while( $ListeEmploiLie = $ListeEmploiLies->fetch() ){
										echo'<li>
												<div class="div_align">
													<form action="p_edition.php?form=poste" method="post" name="casser_lien">
														<input type="hidden" name="table" value="Lien_emploi_Profil_poste"/>
														<input type="hidden" name="champ" value="'.$ListeEmploiLie->id_emploi.'"/>
														<input type="hidden" name="champ_lie" value="'.$obj->id_profil_poste.'"/> 
														<button type="submit" name="casser_lien" formaction="p_edition.php?form=pro_post" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
													</form>
												</div>
												<div class="div_align">'.$ListeEmploiLie->lib_emploi.'</div>
											</li>		
											';
										}
									?>
									</ul>
									<!----Formulaire d'ajout de lien entre PP et emploi DEBUT--->
										<form action="p_edition.php?form=pro_post" method="post">
											<input type="hidden" name="idpp" value="<?php echo $obj->id_profil_poste; ?>"/>
											<?php
											$ListeEmploiNonLies=$connexion->query("SELECT E.id_emploi, E.lib_emploi
																				FROM Emploi E
																				WHERE E.id_emploi NOT IN(SELECT E.id_emploi
																				FROM Emploi E
																				JOIN Lien_emploi_Profil_poste L ON L.id_emploi = E.id_emploi
																				WHERE L.id_profil_poste=".$obj->id_profil_poste.")"); 
											$ListeEmploiNonLies->setFetchMode(PDO::FETCH_OBJ);
											?>
											<select name="inputLiaison"  class="selectpicker form-control">
												<?php
												while( $ListeEmploiNonLie = $ListeEmploiNonLies->fetch()){
													echo'<option value="'.$ListeEmploiNonLie->id_emploi.'">'.$ListeEmploiNonLie->lib_emploi.'</option>';
												}
												?>
											</select>
											<button type="submit" name="add_lien_pp_emploi" formaction="p_edition.php?form=pro_post" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
										</form>
									<!----Formulaire d'ajout de lien entre PP et emploi FIN--->
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
					//echo '<td>'.$obj->id_profil_poste.'</td>';
					echo '<td><a onclick="details('.$obj->id_profil_poste.')">'.$obj->lib_profil_poste.'</a></td>';
					echo '<td>
							<form action="p_edition.php?form=pro_post" method="post" name="suppr_pp">
								<input type="hidden" name="idpp" value="'.$obj->id_profil_poste.'"/>
								<button type="submit" name="edit" onMouseOver="show2(\'Modification de profil de poste\')" onMouseOut="hide2()" formaction="p_edition.php?form=pro_post" class="btn btn-warning btn-mini"><i class="icon-cog icon-white"></i></button>
								<button type="submit" name="del" onclick="return(confirm(\'Veuillez confirmer la suppression\'))"  onMouseOver="show2(\'Suppression de profil de poste\')" onMouseOut="hide2()" formaction="p_edition.php?form=pro_post" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i></button>
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