<h3>
 <center>Traitement EMPLOI</center>
</h3>

<?php
	//if($_POST['LibEmploi'] != 3){
		$LibEmploi=$_POST['LibEmploi'];
		//}
		$DescrEmploi=$_POST['DescrEmploi'];
	
	echo 'Libellé Emploi : '.$LibEmploi;?><br/><?php
	echo 'Description Emploi : '.$DescrEmploi;
?>

<p>
	Traiement : OK !!
</p>


<?php
	$hote='mysql51-120.perso'; 
	$port='3306';
	$nom_bd='hrprofil'; 
	$utilisateur='root'; 
	$mot_passe=''; 
	

try
{
        $connexion = new PDO('mysql:host='.$hote.';dbname='.$nom_bd, $utilisateur, $mot_passe);
}
 
catch(Exception $e)
{
        echo 'Une erreur est survenue !';
        die();
}
 
$connexion->exec("INSERT INTO `hrprofil`.`emploi` (`lib_emploi`, `descr_emploi`) VALUES ('".$LibEmploi."', '".$DescrEmploi."');");

?>