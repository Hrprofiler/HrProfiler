<h2>
    <center>Formulaire de groupe</center>
</h2>

<p>
    Merci, Ton groupe s'appelle <?php echo $_POST['lib_groupe']; ?> !</p>
</p>
 
<p>
	Si tu veux changer le nom de ce groupe, <a href="Formulaire_Groupes.html">clique ici</a> !!!
</p>

<?php

$Lib_Groupe=$_POST['lib_groupe'];

/*Connexion la base de données */
$PARAM_hote='localhost'; // le chemin vers le serveur
$PARAM_port='3306';
$PARAM_nom_bd='hrprofil_bdd'; // le nom de votre base de données
$PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter
try
{
        $connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
}
 
catch(Exception $e)
{
        echo 'Une erreur est survenue !';
        die();
}

$connexion->exec("INSERT INTO  `hrprofil_bdd`.`groupe` (`lib_groupe`)VALUES ('".$Lib_Groupe."');"); 


?>



<p>
    Hé hé <?php echo $Lib_Groupe; ?> !</p>
</p>