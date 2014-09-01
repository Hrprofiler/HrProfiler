<?php
// On met les variables utilisés du script PHP à FALSE.
$error = FALSE;

$connexion = FALSE;

// On regarde si l'utilisateur a bien utilisé le module de connexion pour traiter les données.
if(isset($_POST["connexion"])){
   
   // On regarde si tout les champs sont remplis. Sinon on lui affiche un message d'erreur.   
   if($_POST["login"] == NULL OR $_POST["pass"] == NULL){
      
      $error = TRUE;
      
      $errorMSG = "Vous devez saisir un login ou un MPD !";
      
   }
   
   // Sinon si tout les champs sont remplis alors on regarde si le nom de compte rentré existe bien dans la base de données.
   else{
      
      $sql = "SELECT  U.login_user
							FROM Utilisateur 
							WHERE  login_user = '".$_POST["login"]."' ";
      
      $req = mysql_query($sql);
      
      // Si oui, on continue le script...      
      if($sql){
         
         // On sélectionne toute les données de l'utilisateur dans la base de données.   
         $sql = "SELECT * FROM Utilisateur WHERE login_user = '".$_POST["login"]."' ";
      
         $req = mysql_query($sql);
         
         // Si la requête SQL c'est bien passé...      
         if($sql){
         
            // On récupère toute les données de l'utilisateur dans la base de données.
            $donnees = mysql_fetch_assoc($req);
            
            // Si le mot de passe entré à la même valeur que celui de la base de données, on l'autorise a se connecter...         
            if($_POST["pass"] == $donnees["pass_user"]){
            
               $connexionOK = TRUE;
               
               $connexionMSG = "Connexion au site réussie. Vous êtes désormais connecté !";
               
               $_SESSION["login_user"] = $_POST["login"];
               
               $_SESSION["pass_user"] = $_POST["pass"];
            
            }
            
            // Sinon on lui affiche un message d'erreur.
            else{
            
               $error = TRUE;
            
               $errorMSG = "Nom de compte ou mot de passe incorrect !";
            
            }
         
         }
         
         // Sinon on lui affiche un message d'erreur.      
         else{
         
            $error = TRUE;
         
            $errorMSG = "Nom de compte ou mot de passe incorrect !";
         
         }
      
      }
      
      // Sinon on lui affiche un message d'erreur.      
      else{
         
         $error = TRUE;
         
         $errorMSG = "Nom de compte ou mot de passe incorrect !";
         
      }
   
   }
   
}



?>

<?php if(isset($_SESSION["login"]) AND isset($_SESSION["pass"])){
   
   echo "<p>Bienvenue <strong>".$_SESSION["login"]."</strong></p>";
   
} ?>

<?php if($error == TRUE){ echo "<p><strong>".$errorMSG."</strong></p>"; } ?>

<?php if($connexionOK == TRUE){ echo "<p><strong>".$connexionMSG."</strong></p>"; } ?>


div class="container" id="form_connexion">
	<legend>Connexion<div id="output" class="pull-right"></div></legend>
	<div class="container-fluid hero-unit">
		<form action="index.php" method="post" class="form-horizontal">
			<div class="span8">
				<div class="control-group">
					<label class="control-label" for="inputLogin">Login</label>
					<div class="controls">
						<input type="text" id="login" name="login" required="required">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPass">Mot de passe</label>
					<div class="controls">
						<input type="password" id="pass" name="pass" required="required">
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