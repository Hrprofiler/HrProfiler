<?php
header('Content-Type: text/xml'); 
echo "<?xml version=\"1.0\"?>\n";
echo "<exemple>\n";
 
//on connecte a la BDD
$dbhost="localhost";
$dbuser="gael";
$dbpass="donat ";
 
$dblink=mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db("gael",$dblink);
 
//on lance la requete
$query = "SELECT * FROM temp";
$result = mysql_query($query,$dblink) or die (mysql_error($dblink));
 
//On boucle sur le resultat
while ($row = mysql_fetch_array($result, MYSQL_NUM))
{
	echo "<donnee>" . $row[0] . "</donnee>\n";
}
echo "</exemple>\n";
 
?>
