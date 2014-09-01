<?php
	include '../includes/header.php';
	include '../includes/fonctions.php';

$connexion =getDbConnexion();
$ListeElementsTable=$connexion->query("SELECT id_'".$_POST["table"]."', lib_'".$_POST["table"]."'  FROM '".$_POST["table"]."'");
while( $ElementsTable = $ListeElementsTable->fetch(PDO::FETCH_OBJ)){
	echo '<li id="'.$ElementsTable->id_+$_POST["table"].'"><a href="p_cartographie.php?'.$table.'">'.$ElementsTable->libelle_+$_POST["table"].'</a>';
}	
	
$result = @tjs_query($query);
/*
 * http://www.toutjavascript.com/savoir/xmlhttprequest.php3
echo 'var o = null;';
echo 'var s = document.forms["'.$_POST["form"].'"].elements["'.$_POST["select"].'"];';
echo 's.options.length = 0;';
while($r = mysql_fetch_array($result))
	echo 's.options[s.options.length] = new Option("'.$r["Species"].'");';

@mysql_close($mysql_db);
 
 */
?>