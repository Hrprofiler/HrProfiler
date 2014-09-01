<?php
	$connexion =getDbConnexion();
	$ListeUtilisateurs=$connexion->query("SELECT  U.id_user, U.login_user, U.nom_user, U.prenom_user, U.mail_user, G.lib_groupe
							FROM Utilisateur U
							JOIN Groupe G 
							ON U.id_groupe= G.id_groupe");
	$ListeUtilisateurs->setFetchMode(PDO::FETCH_OBJ);
	
	var_dump($ListeUtilisateursr);
	
	if (isset($_POST['connexion'])) {
			var_dump($_POST['inputLogin']);
			$utilisateur=$connexion->query("SELECT  U.id_user, U.login_user, U.nom_user, U.prenom_user, U.mail_user
							FROM Utilisateur U
							WHERE U.login_user = '".$_POST['inputLogin']."'");
			$utilisateur->fetch(PDO::FETCH_OBJ);
			var_dump($utilisateur->id_user);
	} 
		/*if(sha1($_POST['inputLogin']).sha1($_POST['inputPass']) == $user->password) {
		echo "1";
			/*
						session_start();
						$_SESSION['id'] = $user->id_user;
						$_SESSION['login'] = $user->login_user;
						$_SESSION['nom'] = $user->nom_user; 
						$_SESSION['prénom'] = $user->prenom_user;
						$_SESSION['grp'] = $user->id_groupe;
		header('Location: pages/p_config_gestion.php');
		}
		else {
			
		}*/
		header('Location: pages/p_cartographie.php');
		
?>

<div class="container" id="form_connexion">
	<legend>Connexion<div id="output" class="pull-right"></div></legend>
	<div class="container-fluid hero-unit">
		<form action="index.php" method="post" class="form-horizontal">
			<div class="span8">
				<div class="control-group">
					<label class="control-label" for="inputLogin">Login</label>
					<div class="controls">
						<input type="text" id="inputLogin" name="inputLogin" required="required">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPass">Mot de passe</label>
					<div class="controls">
						<input type="password" id="inputPass" name="inputPass" required="required">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<input type="submit" action="index.php"  name="connexion" class="btn btn-success active" value="Connexion" onMouseOver="show('Se connecter')" onMouseOut="hide()"/>
					</div>
				</div>
			</div>		
		</form>
	</div>
</div>