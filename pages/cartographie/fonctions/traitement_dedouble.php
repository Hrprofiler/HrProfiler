<?php

$dbname = 'hrprofil_bdd';
mysql_connect('localhost', 'hrprofil_bdd', '');
mysql_select_db('hrprofil_bdd');

$choix = $_POST['choix'];

if($choix="Emploi")
{

$req1=mysql_query ("SELECT lib_emploi FROM Emploi");
echo '<select size=1 name=\"chans\">'."\n";
echo '<option value=\"-1\">Choisir un résultat<option>'."\n"; 

 $ReqLog = mysql_db_query("$dbname", $req1);
  while ($resultat = mysql_fetch_row($ReqLog)) {
    echo '<option value=\"'.$resultat[0].'\">'.$resultat[1];
    echo '</option>'."\n";
  }

  echo '</select>'."\n"; 
}

?>