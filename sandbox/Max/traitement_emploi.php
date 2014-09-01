<?php


if ( isset($_POST['Submit']) && $_POST['Submit'] == 'Envoyer') // ton if ne fonctionnait jamais (en gros $_POST['Envoyer']) cherche un champ avec un name="Envoyer" alors que tu l'as en valeur 
 
 { 
//recupération des champs
$lib_emploi = htmlspecialchars($_POST['Libemploi']);
$desc_emploi = htmlspecialchars($_POST['Descemploi']); // htmlspecialchars pour sécurisé un minima ce que tu insert 

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
$reqemp = "INSERT INTO emploi(lib_emploi,descr_emploi) VALUES ('" . $lib_emploi . "','" . $desc_emploi . "')";

var_dump($conBDD->query($reqemp));
 
//deconnexion bdd
$conBDD->close(); 

?>


