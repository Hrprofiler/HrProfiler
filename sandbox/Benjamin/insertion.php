<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Création de compétences</title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   </head>
 
   <body>
	   
	   <?php
  //connection au serveur
  $cnx = mysql_connect( "localhost", "root", "root" ) ;
  //sélection de la base de données:
 $db  = mysql_select_db( "HRProfil" ) ;
 //encodage UTF-8
 mysql_query("SET NAMES UTF8"); 
 
  //récupération des valeurs des champs:
  //libellé compétence
  $lib_competence = $_POST["lib_competence"] ;
  //description compétence
  $desc_competence = $_POST["desc_competence"] ;
  //type compétence
  $type_competence = $_POST["type_competence"] ;
  //gestion des erreurs de saisie
  if(empty($lib_competence))$erreur='Veuillez saisir un nom de competence competence.';
  if(empty($desc_competence))$erreur='Veuillez saisir une description de competence.';
  if(empty($type_competence))$erreur='Veuillez saisir un type de competence.';
  if($erreur!='')
    {echo '<script language=javascript> alert ($erreur);</script>';
     echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="formulaire.php" </SCRIPT>';
     exit;}

  //création de la requête SQL:
  $sql = "INSERT  INTO competence (lib_competence, desc_competence, type_competence)
            VALUES ( '$lib_competence','$desc_competence','$type_competence');" ;
 
  //exécution de la requête SQL:
  $requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
 
  //affichage des résultats, pour savoir si l'insertion a marchée:
  if($requete)
  {
    echo("Vos informations ont été enregistrés") ;
  }
  else
  {
    echo("L'insertion à échouée") ;
  }
?>

 
   </body>
</html>