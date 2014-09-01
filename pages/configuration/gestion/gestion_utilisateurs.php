
<div id="conteneur_gestion_utilisateurs">
	<?php
	//on appel la fonction de connexion
	$connexion =getDbConnexion();
	
	//on récup la liste des elements existant
	$ListeUtilisateurs=$connexion->query("SELECT  U.id_user, U.login_user, U.nom_user, U.prenom_user, U.mail_user, G.lib_groupe
							FROM Utilisateur U
							JOIN Groupe G 
							ON U.id_groupe= G.id_groupe");
	$ListeUtilisateurs->setFetchMode(PDO::FETCH_OBJ);
	/*en fonction de l'actions :*/
	
	//si on supprime
	if (isset($_POST['del'])) {
		$connexion->exec("DELETE FROM Utilisateur WHERE id_user =".$_POST['id_Utilisateur']);
		header('Location: p_config_gestion.php');   
	}
		
	//si on ajoute
	if ( isset($_POST['add'])){
		
		$connexion->exec("INSERT INTO Utilisateur SET login_user = '".$_POST['login']."', 
											pass_user = '".sha1($_POST['login'].sha1('panda'))."',
											nom_user = '".$_POST['nom']."',
											prenom_user = '".$_POST['prenom']."',
											mail_user = '".$_POST['mail']."',
											id_groupe = ".$_POST['id_groupe']);
		header('Location: p_config_gestion.php');   
	}
	
	//si on update
	if (isset($_POST['modif'])){
		$connexion->exec("UPDATE Utilisateur SET nom_user = '".$_POST['inputNom']."',
										prenom_user = '".$_POST['inputPrenom']."',
										id_groupe = '".$_POST['inputGroupe']."'
						WHERE id_user = '".$_POST['inputId']."'");
		header('Location: p_config_gestion.php');   
		btAlertMini("alert-success", "Succès : ", "Utilisateur modifié avec succés");
	}	
	$ListeGroupes=$connexion->query("SELECT id_groupe, lib_groupe FROM Groupe");
	$ListeGroupes->setFetchMode(PDO::FETCH_OBJ);
	?>
		
	
	<?php 
		if (isset($_POST['edit'])) {
			$modifierUtilisateurs=$connexion->query("SELECT  U.id_user, U.login_user, U.nom_user, U.prenom_user, U.mail_user, U.id_groupe
							FROM Utilisateur U
							WHERE U.id_user = '".$_POST['id_Utilisateur']."'");
			while( $modifierUtilisateur = $modifierUtilisateurs->fetch(PDO::FETCH_OBJ)){
				?>
		<div class="container-fluid">
		<legend>Modification d'un utilisateur<div id="output" class="pull-right"></div></legend>
			<div class="container-fluid hero-unit">
				<form action="p_config_gestion.php" method="post" class="form-horizontal">
					<div class="span8">
							<div class="control-group">
								<label class="control-label" for="inputLogin">Login</label>
								<div class="controls">
									<input type="hidden" id="inputId" name="inputId" required="" value="<?php echo $modifierUtilisateur->id_user;?>">
									<input type="text" id="inputLogin" name="inputLogin" required="" value="<?php echo $modifierUtilisateur->login_user;?>" >
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputNom">Nom</label>
								<div class="controls">
									<input type="text" id="inputNom" name="inputNom" required="" value="<?php echo $modifierUtilisateur->nom_user;?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPrenom">Prénom</label>
								<div class="controls">
									<input type="text" id="inputPrenom" name="inputPrenom" required="" value="<?php echo $modifierUtilisateur->prenom_user;?>">
							</div>
							<div class="control-group">
								<label class="control-label" for="inputMail">E-mail</label>
								<div class="controls">
									<input type="email" id="inputMail" name="inputMail" required="" value="<?php echo $modifierUtilisateur->mail_user;?>">
							</div>
							<div class="control-group">
								<label class="control-label" for="inputGroupe">Groupe</label>
								<div class="controls">
									<select name="inputGroupe"  class="selectpicker form-control">
										<?php
										while( $obj = $ListeGroupes->fetch()){
											if ($obj->id_groupe == $modifierUtilisateur->id_groupe){
												echo'<option value="'.$obj->id_groupe.'" selected="selected">'.$obj->lib_groupe.'</option>';
											}
											else{
												echo'<option value="'.$obj->id_groupe.'">'.$obj->lib_groupe.'</option>';
											} 
										}
										?>
									</select>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<button type="submit" name="modif" onMouseOver="show('Valider les modifications')" onMouseOut="hide()"  formaction="p_config_gestion.php"  class="btn btn-success"><i class="icon-pencil icon-white"></i></button>
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
				btAlertMini("alert-success", "Succés : ", "Utilisateur supprimé");
			}
		?>
		<?php 
		if (!isset($_POST['edit'])) {
		?>		
		<legend> Utilisateurs <div id="output2" class="pull-right"></div></legend>
		<table class="table table-hover">
			<thead>
				<tr>
				<th>Login</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Email</th>
				<th>Groupe</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<form action="p_config_gestion.php" method="post">
						<td>
							<input class="span1" type="text" name="login" placeholder="Login" required="true"/>
						</td>
						<td>
							<input class="span1" type="text" name="nom" placeholder="Nom" required="true"/>
						</td>
						<td>
							<input class="span1" type="text" name="prenom" placeholder="Prénom" required="true"/>
						</td>
						<td>
							<input class="span2" type="email" name="mail" placeholder="E-mail" required="true"/>
						</td>
						<td>
							<select name="id_groupe" class="span2 form-control">
								<?php
								while( $obj = $ListeGroupes->fetch() ){
									echo'<option value="'.$obj->id_groupe.'">'.$obj->lib_groupe.'</option>';
									}
								?>
							</select>
						</td>
						<td>
							<button type="submit" name="add" formaction="p_config_gestion.php" onMouseOver="show2('Créer Utilisateur')" onMouseOut="hide2()" class="btn btn-success btn-mini"><i class="icon-ok icon-white"></i></button>
						</td>
					</form>
				</tr>
			<?php
				while( $obj = $ListeUtilisateurs->fetch() ){
					echo '<tr>';
					echo '<td>'.$obj->login_user.'</td>';
					echo '<td>'.$obj->nom_user.'</td>';
					echo '<td>'.$obj->prenom_user.'</td>';
					echo '<td>'.$obj->mail_user.'</td>';
					echo '<td>'.$obj->lib_groupe.'</td>';
					echo '<td>
							<form action="p_config_gestion.php" method="post" name="suppr_Utilisateur">
								<input type="hidden" name="id_Utilisateur" value="'.$obj->id_user.'"/>
								<button type="submit" name="edit" onMouseOver="show2(\'Modification du Utilisateur\')" onMouseOut="hide2()" formaction="p_config_gestion.php" class="btn btn-warning btn-mini"><i class="icon-cog icon-white"></i></button>
								<button type="submit" name="del" onclick="return(confirm(\'Veuillez confirmer la suppression\'))"  onMouseOver="show2(\'Suppression du Utilisateur\')" onMouseOut="hide2()" formaction="p_config_gestion.php" class="btn btn-danger btn-mini"><i class="icon-trash icon-white"></i></button>
							</form>
						  </td>';
					echo '</tr>';
				}
			?>
			</tbody>
		</table>
		<?php
		}
		?>
	</div>
	
</div>