<?php


if ( isset($_POST['Submit']) && $_POST['Submit'] == 'Envoyer') // ton if ne fonctionnait jamais (en gros $_POST['Envoyer']) cherche un champ avec un name="Envoyer" alors que tu l'as en valeur 
 
 { 
//recupération des champs
$lib_actgen = htmlspecialchars($_POST['LibActgen']);
$desc_actgen = htmlspecialchars($_POST['DescActgen']); // htmlspecialchars pour sécurisé un minima ce que tu insert 

 }

//connexion bdd
$hostname='127.0.0.1';
$user='root';
$password='';
$dbname='hrprofil_bdd';

$conBDD = new mysqli ($hostname,$user,$password,$dbname); // Pourquoi ne pas passer par la PDO ? Avec la PDO, c'est plus sécurisé et les mysql_ et mysqli_ n'existent plus


if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

//requête
$reqactgen = "INSERT INTO activite_generique(lib_actgen,descr_actgen) VALUES ('" . $lib_actgen . "','" . $desc_actgen . "')";

var_dump($conBDD->query($reqactgen));
 
//deconnexion bdd
$conBDD->close(); 

?>


