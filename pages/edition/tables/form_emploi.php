<?php
//on appel la fonction de connexion
$connexion =getDbConnexion();

//on récup la liste des elements existant
$ListeEmploi=$connexion->query("SELECT id_emploi, lib_emploi, descr_emploi FROM Emploi");
$ListeEmploi->setFetchMode(PDO::FETCH_OBJ);

/*en fonction de l'actions :*/

//si on supprime
if (isset($_POST['del'])) {
	$connexion->exec("DELETE FROM Emploi WHERE id_emploi =".$_POST['idemploi']);
	header('Location: p_edition.php?form=emploi');   
	btAlertMini("alert-success", "Succès : ", "Emploi supprimé avec succés");
}
	
//si on ajoute
if ( isset($_POST['add'])){
	$connexion->exec("INSERT INTO Emploi SET lib_emploi = '".$_POST['libemploi']."',
										descr_emploi = '".$_POST['descremploi']."'");
	header('Location: p_edition.php?form=emploi');  
	btAlertMini("alert-success", "Succès : ", "Emploi ajouté avec succés");								
}

//si on update
if (isset($_POST['modif'])){	
	$connexion->exec("UPDATE Emploi SET lib_emploi = '".$_POST['inputLibemploi']."',
									descr_emploi = '".$_POST['inputDescremploi']."'								
					WHERE id_emploi = '".$_POST['inputIdemploi']."'");			
	header('Location: p_edition.php?form=emploi');   
	btAlertMini("alert-success", "Succès : ", "Emploi modifié avec succés");
}

// si on ajoute un lien entre un Emploi et un portefeuille:
if (isset($_POST['add_lien_emp_port'])){
	$connexion->exec("INSERT INTO Lien_emploi_Portefeuille SET id_emploi = '".$_POST['idemploi']."', id_portefeuille= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idemploi'];
	//header('Location: p_edition.php?form=emploi');  
							
}

// si on ajoute un lien entre un Emploi et un profil de poste:
if (isset($_POST['add_lien_emp_pp'])){
	$connexion->exec("INSERT INTO Lien_emploi_Profil_poste SET id_emploi = '".$_POST['idemploi']."', id_profil_poste= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idemploi'];
	//header('Location: p_edition.php?form=emploi');  					
}

// si on ajoute un lien entre un Emploi et une Activité Générique:
if (isset($_POST['add_lien_emp_actgen'])){
	$connexion->exec("INSERT INTO Lien_emploi_Activite_generique SET id_emploi = '".$_POST['idemploi']."', id_actgen= '".$_POST['inputLiaison']."'");
	$rafraichir=$_POST['idemploi'];
	//header('Location: p_edition.php?form=emploi');  					
}

//si on supprime un lien
if (isset($_POST['casser_lien'])){
	//on récupere les noms des champs de la table liens
	switch ($_POST['table']) {
	    case 'Lien_emploi_Portefeuille':
	        $connexion->exec("DELETE FROM Lien_emploi_Portefeuille WHERE id_portefeuille =".$_POST['champ']." and id_emploi=".$_POST['champ_lie']);
			break;
	    case 'Lien_emploi_Profil_poste':
	        $connexion->exec("DELETE FROM Lien_emploi_Profil_poste WHERE id_profil_poste =".$_POST['champ']." and id_emploi=".$_POST['champ_lie']);
			break;
		case 'Lien_emploi_Activite_generique':
	        $connexion->exec("DELETE FROM Lien_emploi_Activite_generique WHERE id_actgen =".$_POST['champ']." and id_emploi=".$_POST['champ_lie']);
			break;
	}
	$rafraichir=$_POST['champ_lie'];
}
?>


<?php 
	if (isset($_POST['edit'])&& $_POST['idemploi']) {

		$modifierEmploi=$connexion->query("SELECT id_emploi, lib_emploi, descr_emploi
						FROM Emploi
						WHERE id_emploi =".$_POST['idemploi']);
		$modifierEmploi = $modifierEmploi->fetch(PDO::FETCH_OBJ);
			?>					
	<div class="container-fluid">
		<legend>Modification d'un emploi<div id="output" class="pull-right"></div></legend>
		<div class="container-fluid hero-unit">
			<form action="p_edition.php?form=emploi" method="post" class="form-horizontal">
				<div class="span6">
						<div class="control-group">
							<label class="control-label" for="inputLibemploi">Libellé</label>
							<div class="controls">
								<input type="hidden" id="inputIdemploi" name="inputIdemploi" required="" value="<?php echo $modifierEmploi->id_emploi;?>">
								<input type="text" id="inputLibemploi" name="inputLibemploi" required="" value="<?php echo $modifierEmploi->lib_emploi;?>" >
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="inputDescremploi">Description</label>
							<div class="controls">
								<input type="text" id="inputDescremploi" name="inputDescremploi" required="" value="<?php echo $modifierEmploi->descr_emploi;?>">
							</div>
						</div>
						
			
						<div class="control-group">
							<div class="controls">
								<button type="submit" name="modif" onMouseOver="show('Valider les modifications')" onMouseOut="hide()"  formaction="p_edition.php?form=emploi"  class="btn btn-success"><i class="icon-pencil icon-white"></i></button>
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
			btAlertMini("alert-success", "Succés : ", "Emploi supprimé");
		}
	?>
	<legend> Liste des emplois <div id="output2" class="pull-right"></div></legend>
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
				<form action="p_edition.php?form=emploi" method="post">
					<td>
						<input class="span1" type="text" name="libemploi" placeholder="Libellé" required=""/>
					</td>
					<td>
						<input class="span2" type="text" name="descremploi" placeholder="Description" required=""/>
					</td>
					
					<td>
						<button type="submit" name="add" formaction="p_edition.php?form=emploi" onMouseOver="show2('Créer emploi')" onMouseOut="hide2()" class="btn btn-success btn-mini"><i class="icon-ok icon-white"></i></button>
					</td>
				</form>
			</tr>
			<?php
			while( $obj = $ListeEmploi->fetch() ){
				?>
				<!----Pop-UP des lien avec l'élement cliqué DEBUT--->
				<div class="modal fade" style="display:none" id="myModal_<?php echo $obj->id_emploi;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Emploi: <?php echo $obj->lib_emploi;?></h4>
						</div>
						<div class="modal-body">
							<h4>Portefeuille liés:</h4>
							<ul class="liste_liens">
							<?php 
							$ListePortefeuilleLies=$connexion->query("SELECT P.id_portefeuille, P.lib_portefeuille 
																FROM Portefeuille P
																JOIN Lien_emploi_Portefeuille L ON L.id_portefeuille = P.id_portefeuille
																WHERE L.id_emploi=".$obj->id_emploi);
							$ListePortefeuilleLies->setFetchMode(PDO::FETCH_OBJ);
							while( $ListePortefeuilleLie = $ListePortefeuilleLies->fetch() ){
								echo'<li>
										<div class="div_align">
											<form action="p_edition.php?form=emploi" method="post" name="casser_lien">
												<input type="hidden" name="table" value="Lien_emploi_Portefeuille"/>
												<input type="hidden" name="champ" value="'.$ListePortefeuilleLie->id_portefeuille.'"/>
												<input type="hidden" name="champ_lie" value="'.$obj->id_emploi.'"/> 
												<button type="submit" name="casser_lien" formaction="p_edition.php?form=emploi" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
											</form>
										</div>
										<div class="div_align">'.$ListePortefeuilleLie->lib_portefeuille.'</div>
									</li>
								';
								}
							?>
							</ul>	
							<!----Formulaire d'ajout de lien entre emploi et Portefeuille DEBUT--->
							<form action="p_edition.php?form=emploi" method="post">
								<input type="hidden" name="idemploi" value="<?php echo $obj->id_emploi; ?>"/>
								<?php
								$ListePortefeuilleNonLies=$connexion->query("SELECT P.id_portefeuille, P.lib_portefeuille 
																	FROM Portefeuille P 
																	WHERE P.id_portefeuille NOT IN(SELECT P.id_portefeuille 
																	FROM Portefeuille P
																	JOIN Lien_emploi_Portefeuille L ON L.id_portefeuille = P.id_portefeuille
																	WHERE L.id_emploi=".$obj->id_emploi.")");
								$ListePortefeuilleNonLies->setFetchMode(PDO::FETCH_OBJ);
								?>
								<select name="inputLiaison"  class="selectpicker form-control">
									<?php
									while( $ListePortefeuilleNonLie = $ListePortefeuilleNonLies->fetch()){
										echo'<option value="'.$ListePortefeuilleNonLie->id_portefeuille.'">'.$ListePortefeuilleNonLie->lib_portefeuille.'</option>';
									}
									?>
								</select>
								<button type="submit" name="add_lien_emp_port" formaction="p_edition.php?form=emploi" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
							</form>
							<!----Formulaire d'ajout de lien entre emploi et portfeuille FIN--->
							<h4>Profil de postes liés </h4>
							<ul class="liste_liens">
						    <?php 
							$ListeProPosteLies=$connexion->query("SELECT PP.id_profil_poste, PP.lib_profil_poste 
																FROM Profil_poste PP
																JOIN Lien_emploi_Profil_poste L ON L.id_profil_poste = PP.id_profil_poste
																WHERE L.id_emploi=".$obj->id_emploi);
							$ListeProPosteLies->setFetchMode(PDO::FETCH_OBJ);
							while( $ListeProPosteLie = $ListeProPosteLies->fetch() ){
								echo'<li>
									<div class="div_align">
										<form action="p_edition.php?form=emploi" method="post" name="casser_lien">
											<input type="hidden" name="table" value="Lien_emploi_Profil_poste"/>
											<input type="hidden" name="champ" value="'.$ListeProPosteLie->id_profil_poste.'"/>
											<input type="hidden" name="champ_lie" value="'.$obj->id_emploi.'"/> 
											<button type="submit" name="casser_lien" formaction="p_edition.php?form=emploi" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
										</form>
									</div>
									<div class="div_align">'.$ListeProPosteLie->lib_profil_poste.'</div>
								</li>		
								';
								}
							?>
							</ul>
							<!----Formulaire d'ajout de lien entre emploi et PP DEBUT--->
							<form action="p_edition.php?form=emploi" method="post">
								<input type="hidden" name="idemploi" value="<?php echo $obj->id_emploi; ?>"/>
								<?php
								$ListeProPosteNonLies=$connexion->query("SELECT PP.id_profil_poste, PP.lib_profil_poste 
																	FROM Profil_poste PP
																	WHERE PP.id_profil_poste NOT IN(SELECT PP.id_profil_poste 
																	FROM Profil_poste PP
																	JOIN Lien_emploi_Profil_poste L ON L.id_profil_poste = PP.id_profil_poste
																	WHERE L.id_emploi=".$obj->id_emploi.")");
								$ListeProPosteNonLies->setFetchMode(PDO::FETCH_OBJ);
								?>
								<select name="inputLiaison"  class="selectpicker form-control">
									<?php
									while( $ListeProPosteNonLie = $ListeProPosteNonLies->fetch()){
										echo'<option value="'.$ListeProPosteNonLie->id_profil_poste.'">'.$ListeProPosteNonLie->lib_profil_poste.'</option>';
									}
									?>
								</select>
								<button type="submit" name="add_lien_emp_pp" formaction="p_edition.php?form=emploi" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
							</form>
							<!----Formulaire d'ajout de lien entre Poste et PP FIN--->	
							<h4>Activités génériques liées:</h4>
							<ul class="liste_liens">
								<?php 
								$ListeActgenLies=$connexion->query("SELECT A.id_actgen, A.lib_actgen 
																	FROM Activite_generique A
																	JOIN Lien_emploi_Activite_generique L ON L.id_actgen = A.id_actgen
																	WHERE L.id_emploi=".$obj->id_emploi);
								$ListeActgenLies->setFetchMode(PDO::FETCH_OBJ);
								while( $ListeActgenLie = $ListeActgenLies->fetch()){
									echo'<li>
										<div class="div_align">
											<form action="p_edition.php?form=emploi" method="post" name="casser_lien">
												<input type="hidden" name="table" value="Lien_emploi_Activite_generique"/>
												<input type="hidden" name="champ" value="'.$ListeActgenLie->id_actgen.'"/>
												<input type="hidden" name="champ_lie" value="'.$obj->id_emploi.'"/> 
												<button type="submit" name="casser_lien" formaction="p_edition.php?form=emploi" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
											</form>
										</div>
										<div class="div_align">'.$ListeActgenLie->lib_actgen.'</div>
									</li>		
									';
									}
								?>
							</ul>
							<!----Formulaire d'ajout de lien entre Emploi et Activite generique DEBUT--->				
							<form action="p_edition.php?form=emploi" method="post">
								<input type="hidden" name="idemploi" value="<?php echo $obj->id_emploi; ?>"/>
								<?php
								$ListeActgenNonLies=$connexion->query("SELECT A.id_actgen, A.lib_actgen
															FROM Activite_generique A
															WHERE A.id_actgen NOT IN(SELECT A.id_actgen
															FROM Activite_generique A
															JOIN Lien_emploi_Activite_generique L ON L.id_actgen = A.id_actgen
															WHERE L.id_emploi=".$obj->id_emploi.")");
								$ListeActgenNonLies->setFetchMode(PDO::FETCH_OBJ);
								?>
								<select name="inputLiaison"  class="selectpicker form-control">
								<?php
								while( $ListeActgenNonLie = $ListeActgenNonLies->fetch()){
									echo'<option value="'.$ListeActgenNonLie->id_actgen.'">'.$ListeActgenNonLie->lib_actgen.'</option>';
								}
								?>
								</select>
								<button type="submit" name="add_lien_emp_actgen" formaction="p_edition.php?form=emploi" class="btn btn-success "><i class="icon-plus icon-white"></i> Ajouter lien</button>
							</form>
							<!----Formulaire d'ajout de lien entre Emploi et Activite generique FIN--->
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
				//echo '<td>'.$obj->id_emploi.'</td>';
				echo '<td><a onclick="details('.$obj->id_emploi.')">'.$obj->lib_emploi.'</a></td>';
				echo '<td>'.$obj->descr_emploi.'</td>';
				echo '<td>
						<form action="p_edition.php?form=emploi" method="post" name="suppr_emploi">
							<input type="hidden" name="idemploi" value="'.$obj->id_emploi.'"/>
							<button type="submit" name="edit" onMouseOver="show2(\'Modification de emploi\')" onMouseOut="hide2()" formaction="p_edition.php?form=emploi" class="btn btn-warning btn-mini"><i class="icon-cog icon-white"></i></button>
							<button type="submit" name="del" onclick="return(confirm(\'Veuillez confirmer la suppression\'))"  onMouseOver="show2(\'Suppression de emploi\')" onMouseOut="hide2()" formaction="p_edition.php?form=emploi" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i></button>
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