<?php
//on appel la fonction de connexion
$connexion =getDbConnexion();

//on récup la liste des elements existants
$ListePortefeuille=$connexion->query("SELECT id_portefeuille, lib_portefeuille FROM Portefeuille");
$ListePortefeuille->setFetchMode(PDO::FETCH_OBJ);

/*en fonction de l'actions :*/
//si on supprime
if (isset($_POST['del'])) {
	$connexion->exec("DELETE FROM Portefeuille WHERE id_portefeuille =".$_POST['idportefeuille']);
	header('Location: p_edition.php?form=portefeuille');   
	btAlertMini("alert-success", "Succés : ", "Portefeuille supprimé avec succés");
}
	
//si on ajoute
if ( isset($_POST['add'])){

	$connexion->exec("INSERT INTO Portefeuille SET lib_portefeuille = '".$_POST['libportefeuille']."'"); 
	
	header('Location: p_edition.php?form=portefeuille');  
	btAlertMini("alert-success", "Succés : ", "Portefeuille ajouté avec succés");								
}

//si on update
if (isset($_POST['modif'])){
	
	$connexion->exec("UPDATE Portefeuille SET lib_portefeuille = '".$_POST['inputLibportefeuille']."'
									
					WHERE id_portefeuille = '".$_POST['inputIdportefeuille']."'");
					
	header('Location: p_edition.php?form=portefeuille');   
	btAlertMini("alert-success", "Succés : ", "Portefeuille modifié avec succés");
}

// si on ajoute un lien entre un Portefeuille et un Emploi:
if (isset($_POST['add_lien_port_emploi'])){
	$connexion->exec("INSERT INTO Lien_emploi_Portefeuille SET id_portefeuille = '".$_POST['idportefeuille']."', id_emploi= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idportefeuille'];
	//header('Location: p_edition.php?form=portefeuille');   
							
}

// si on ajoute un lien entre un Portefeuille et une Compétence:
if (isset($_POST['add_lien_port_comp'])){
	$connexion->exec("INSERT INTO Lien_competence_portefeuille SET id_portefeuille = '".$_POST['idportefeuille']."', id_competence= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idportefeuille'];
	//header('Location: p_edition.php?form=portefeuille');  					
}

// si on ajoute un lien entre un Portefeuille et un Collaborateur:
if (isset($_POST['add_lien_port_collab'])){
	$connexion->exec("INSERT INTO Lien_portefeuille_Collaborateur SET id_portefeuille = '".$_POST['idportefeuille']."', id_collaborateur= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idportefeuille'];
	//header('Location: p_edition.php?form=portefeuille');  					
}

//si on supprime un lien
if (isset($_POST['casser_lien'])){
	//on récupere les noms des champs de la table liens
	switch ($_POST['table']) {
	    case 'Lien_portefeuille_Collaborateur':
	        $connexion->exec("DELETE FROM Lien_portefeuille_Collaborateur WHERE id_portefeuille =".$_POST['champ_lie']." and id_collaborateur=".$_POST['champ']);
			break;	
	    case 'Lien_emploi_Portefeuille':
	        $connexion->exec("DELETE FROM Lien_emploi_Portefeuille WHERE id_emploi =".$_POST['champ']." and id_portefeuille=".$_POST['champ_lie']);
			break;
		case 'Lien_competence_portefeuille':
	       $connexion->exec("DELETE FROM Lien_competence_portefeuille WHERE id_competence =".$_POST['champ']." and id_portefeuille=".$_POST['champ_lie']);
			break;
		
	}
	$rafraichir=$_POST['champ_lie'];
}
?>

<?php 
if (isset($_POST['edit'])) {
	$modifierPortefeuilles=$connexion->query("SELECT P.id_portefeuille, P.lib_portefeuille
					FROM Portefeuille P
					WHERE P.id_portefeuille ='".$_POST['idportefeuille']."'");
	while( $modifierPortefeuille = $modifierPortefeuilles->fetch(PDO::FETCH_OBJ)){
		?>
		<div class="container-fluid">
		<legend>Modification d'un portefeuille<div id="output" class="pull-right"></div></legend>
			<div class="container-fluid hero-unit">
				<form action="p_edition.php?form=portefeuille" method="post" class="form-horizontal">
					<div class="span6">
							<div class="control-group">
								<label class="control-label" for="inputLibportefeuille">Libellé</label>
								<div class="controls">
									<input type="hidden" id="inputIdportefeuille" name="inputIdportefeuille" required="" value="<?php echo $modifierPortefeuille->id_portefeuille;?>">
									<input type="text" id="inputLibportefeuille" name="inputLibportefeuille" required="" value="<?php echo $modifierPortefeuille->lib_portefeuille;?>" >
								</div>
							</div>		
							<div class="control-group">
								<div class="controls">
									<button type="submit" name="modif" onMouseOver="show('Valider les modifications')" onMouseOut="hide()"  formaction="p_edition.php?form=portefeuille"  class="btn btn-success"><i class="icon-pencil icon-white"></i></button>
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
				btAlertMini("alert-success", "Succés : ", "Portefeuille supprimé");
			}
		?>
		
		
		<legend> Liste des portefeuilles <div id="output2" class="pull-right"></div></legend>
		<table class="table table-hover">
			<thead>
				<tr>
				<th>Libellé</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<form action="p_edition.php?form=portefeuille" method="post">
						<td><input class="span5" type="text" name="libportefeuille" placeholder="Libellé" required=""/></td>		
						<td>
							<button type="submit" name="add" formaction="p_edition.php?form=portefeuille" onMouseOver="show2('Créer un portefeuille')" onMouseOut="hide2()" class="btn btn-success btn-mini"><i class="icon-ok icon-white"></i></button>
						</td>
					</form>
				</tr>
			<?php
				while( $obj = $ListePortefeuille->fetch() ){
				?>
					<!----Pop-UP des lien avec l''élement cliqué DEBUT--->
						<div class="modal fade" style="display:none" id="myModal_<?php echo $obj->id_portefeuille;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 class="modal-title" id="myModalLabel">Portefeuille: <?php echo $obj->lib_portefeuille;?></h4>
									</div>
									<div class="modal-body">
											<h4>Collaborateurs liés</h4>
											<ul class="liste_liens">
											<?php 
											$ListeCollaborateurLies=$connexion->query("SELECT C.id_collaborateur, C.nom_collaborateur, C.prenom_collaborateur
																				FROM Collaborateur C
																				JOIN Lien_portefeuille_Collaborateur L ON L.id_collaborateur = C.id_collaborateur
																				WHERE L.id_portefeuille=".$obj->id_portefeuille);
											$ListeCollaborateurLies->setFetchMode(PDO::FETCH_OBJ);
											while( $ListeCollaborateurLie = $ListeCollaborateurLies->fetch()){
												echo'<li>
													<div class="div_align">
														<form action="p_edition.php?form=portefeuille" method="post" name="casser_lien">
															<input type="hidden" name="table" value="Lien_portefeuille_Collaborateur"/>
															<input type="hidden" name="champ" value="'.$ListeCollaborateurLie->id_collaborateur.'"/>
															<input type="hidden" name="champ_lie" value="'.$obj->id_portefeuille.'"/> 
															<button type="submit" name="casser_lien" formaction="p_edition.php?form=portefeuille" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
														</form>
													</div>
													<div class="div_align">'.$ListeCollaborateurLie->nom_collaborateur.' '.$ListeCollaborateurLie->prenom_collaborateur.'</div>
												</li>		
												';
												}
											?>
											</ul>
											
											<!----Formulaire d'ajout de lien entre Portfeuille et Collaborateur DEBUT--->
											
												<form action="p_edition.php?form=portefeuille" method="post"> 
													<input type="hidden" name="idportefeuille" value="<?php echo $obj->id_portefeuille; ?>"/>
													<?php
												$ListeCollaborateurNonLies=$connexion->query("SELECT C.id_collaborateur, C.nom_collaborateur, C.prenom_collaborateur
																						FROM Collaborateur C
																						WHERE C.id_collaborateur NOT IN(SELECT C.id_collaborateur 
																						FROM Collaborateur C
																						JOIN Lien_portefeuille_Collaborateur L ON L.id_collaborateur = C.id_collaborateur
																						WHERE L.id_portefeuille=".$obj->id_portefeuille.")");
													$ListeCollaborateurNonLies->setFetchMode(PDO::FETCH_OBJ);
													
													?> 
													<select name="inputLiaison"  class="selectpicker form-control">
														<?php
														while( $ListeCollaborateurNonLie = $ListeCollaborateurNonLies->fetch()){
															echo'<option value="'.$ListeCollaborateurNonLie->id_collaborateur.'">'.$ListeCollaborateurNonLie->nom_collaborateur.' '.$ListeCollaborateurNonLie->prenom_collaborateur.'</option>';
														}
														?> 
													</select>
													<button type="submit" name="add_lien_port_collab" formaction="p_edition.php?form=portefeuille" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
												</form>	
									<!----Formulaire d'ajout de lien entre Portfeuille et Collaborateur FIN--->	  
											<h4>Emploi liés </h4>
											<ul class="liste_liens">
												<?php 
												$ListeEmploiLies=$connexion->query("SELECT E.id_emploi, E.lib_emploi 
																					FROM Emploi E
																					JOIN Lien_emploi_Portefeuille L ON L.id_emploi = E.id_emploi
																					WHERE L.id_portefeuille=".$obj->id_portefeuille);
												$ListeEmploiLies->setFetchMode(PDO::FETCH_OBJ);
												while( $ListeEmploiLie = $ListeEmploiLies->fetch()){
													echo'<li>
													<div class="div_align">
														<form action="p_edition.php?form=portefeuille" method="post" name="casser_lien">
															<input type="hidden" name="table" value="Lien_emploi_Portefeuille"/>
															<input type="hidden" name="champ" value="'.$ListeEmploiLie->id_emploi.'"/>
															<input type="hidden" name="champ_lie" value="'.$obj->id_portefeuille.'"/> 
															<button type="submit" name="casser_lien" formaction="p_edition.php?form=portefeuille" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
														</form>
													</div>
													<div class="div_align">'.$ListeEmploiLie->lib_emploi.'</div>
												</li>		
												';
													}
												?>
											</ul>
				
				                 <!----Formulaire d'ajout de lien entre Portefeuille et Emploi Début--->
											<form action="p_edition.php?form=portefeuille" method="post">
													<input type="hidden" name="idportefeuille" value="<?php echo $obj->id_portefeuille; ?>"/>
													<?php
													$ListeEmploiNonLies=$connexion->query("SELECT E.id_emploi, E.lib_emploi 
																						FROM Emploi E
																						WHERE E.id_emploi NOT IN(SELECT E.id_emploi 
																						FROM Emploi E
																						JOIN Lien_emploi_Portefeuille L ON L.id_emploi = E.id_emploi
																						WHERE L.id_portefeuille=".$obj->id_portefeuille.")");
													$ListeEmploiNonLies->setFetchMode(PDO::FETCH_OBJ);
													?>
													<select name="inputLiaison"  class="selectpicker form-control">
														<?php
														while( $ListeEmploiNonLie = $ListeEmploiNonLies->fetch()){
															echo'<option value="'.$ListeEmploiNonLie->id_emploi.'">'.$ListeEmploiNonLie->lib_emploi.'</option>';
														}
														?>
													</select>
													<button type="submit" name="add_lien_port_emploi" formaction="p_edition.php?form=portefeuille" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
												</form>
					<!----Formulaire d'ajout de lien entre Portefeuille et Emploi FIN--->
									
											<h4>Compétences liées:</h4>
											<ul class="liste_liens">
											<?php 
											$ListeCompetencesLies=$connexion->query("SELECT C.id_competence, C.lib_competence
																				FROM  Competence C
																				JOIN Lien_competence_portefeuille L ON L.id_competence = C.id_competence
																				WHERE L.id_portefeuille=".$obj->id_portefeuille);
											$ListeCompetencesLies->setFetchMode(PDO::FETCH_OBJ);
											while( $ListeCompetencesLie = $ListeCompetencesLies->fetch() ){
												echo'<li>
													<div class="div_align">
														<form action="p_edition.php?form=portefeuille" method="post" name="casser_lien">
															<input type="hidden" name="table" value="Lien_competence_portefeuille"/>
															<input type="hidden" name="champ" value="'.$ListeCompetencesLie->id_competence.'"/>
															<input type="hidden" name="champ_lie" value="'.$obj->id_portefeuille.'"/> 
															<button type="submit" name="casser_lien" formaction="p_edition.php?form=portefeuille" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
														</form>
													</div>
													<div class="div_align">'.$ListeCompetencesLie->lib_competence.'</div>
												</li>		
												';
												}
											?>
											</ul>
											
											<!----Formulaire d'ajout de lien entre Portefeuille et Compétences DEBUT--->
												<form action="p_edition.php?form=portefeuille" method="post">
													<input type="hidden" name="idportefeuille" value="<?php echo $obj->id_portefeuille; ?>"/>
													<?php
													$ListeCompetenceNonLies=$connexion->query("SELECT C.id_competence, C.lib_competence
																						FROM  Competence C
																						WHERE C.id_competence NOT IN(SELECT C.id_competence
																						FROM Competence C
																						JOIN Lien_competence_portefeuille L ON L.id_competence = C.id_competence
																						WHERE L.id_portefeuille=".$obj->id_portefeuille.")"); 
													$ListeCompetenceNonLies->setFetchMode(PDO::FETCH_OBJ);
													?>
													<select name="inputLiaison"  class="selectpicker form-control">
														<?php
														while( $ListeCompetenceNonLie = $ListeCompetenceNonLies->fetch()){
															echo'<option value="'.$ListeCompetenceNonLie->id_competence.'">'.$ListeCompetenceNonLie->lib_competence.'</option>';
														}
														?>
													</select>
													<button type="submit" name="add_lien_port_comp" formaction="p_edition.php?form=portefeuille" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
												</form>
												<!----Formulaire d'ajout de lien entre Portfeuille et competence FIN--->
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
					echo '<td><a onclick="details('.$obj->id_portefeuille.')">'.$obj->lib_portefeuille.'</a></td>';
					echo '<td>
							<form action="p_edition.php?form=portefeuille" method="post" name="suppr_portefeuille">
								<input type="hidden" name="idportefeuille" value="'.$obj->id_portefeuille.'"/>
								<button type="submit" name="edit" onMouseOver="show2(\'Modification du portefeuille\')" onMouseOut="hide2()" formaction="p_edition.php?form=portefeuille" class="btn btn-warning btn-mini"><i class="icon-cog icon-white"></i></button>
								<button type="submit" name="del" onclick="return(confirm(\'Veuillez confirmer la suppression\'))"  onMouseOver="show2(\'Suppression du portefeuille\')" onMouseOut="hide2()" formaction="p_edition.php?form=portefeuille" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i></button>
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