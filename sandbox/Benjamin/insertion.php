<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Cr�ation de comp�tences</title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   </head>
 
   <body>
	   
	   <?php
  //connection au serveur
  $cnx = mysql_connect( "localhost", "root", "root" ) ;
  //s�lection de la base de donn�es:
 $db  = mysql_select_db( "HRProfil" ) ;
 //encodage UTF-8
 mysql_query("SET NAMES UTF8"); 
 
  //r�cup�ration des valeurs des champs:
  //libell� comp�tence
  $lib_competence = $_POST["lib_competence"] ;
  //description comp�tence
  $desc_competence = $_POST["desc_competence"] ;
  //type comp�tence
  $type_competence = $_POST["type_competence"] ;
  //gestion des erreurs de saisie
  if(empty($lib_competence))$erreur='Veuillez saisir un nom de competence competence.';
  if(empty($desc_competence))$erreur='Veuillez saisir une description de competence.';
  if(empty($type_competence))$erreur='Veuillez saisir un type de competence.';
  if($erreur!='')
    {echo '<script language=javascript> alert ($erreur);</script>';
     echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="formulaire.php" </SCRIPT>';
     exit;}

  //cr�ation de la requ�te SQL:
  $sql = "INSERT  INTO competence (lib_competence, desc_competence, type_competence)
            VALUES ( '$lib_competence','$desc_competence','$type_competence');" ;
 
  //ex�cution de la requ�te SQL:
  $requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
 
  //affichage des r�sultats, pour savoir si l'insertion a march�e:
  if($requete)
  {
    echo("Vos informations ont �t� enregistr�s") ;
  }
  else
  {
    echo("L'insertion � �chou�e") ;
  }
?>

 
   </body>
</html>