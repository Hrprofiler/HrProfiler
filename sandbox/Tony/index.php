<!DOCTYPE html>
<html>
<head>
<title>Création d'un collaborateur</title>
</head>

<body>

<form method="post" action="requete.php">
<label>Nom :<input type="text" name="nom"/></label><br/>
<label>Prenom :<input type="text" name="prenom"/></label><br/>

<label>Date de naissance :</label>

        <select name="jour"><option value="">Jour</option>
           <?php for($i=1;$i<=31;$i++) { ?>
				<option value='<?php echo $i;?>' ><?php echo $i;?></option>
			<?php } ?>
        </select>
		<select name="mois"><option value="">Mois</option>
           <?php for($m=1;$m<=31;$m++) { ?>
				<option value='<?php echo $m;?>' ><?php echo $m;?></option>
			<?php } ?>
        </select>
		<select name="annee"><option value="">Annee</option>
           <?php for($a=2014;$a>=1900;$a--) { ?>
				<option value='<?php echo $a;?>' ><?php echo $a;?></option>
			<?php } ?>
        </select><br/>
		
<label>Societe :<input type="text" name="ste"/></label><br/>
<label>Service :<input type="text" name="srv"/></label><br/>
Sexe :<input type="radio" name="sexe" value="H"/><label>H</label> <input type="radio" name="sexe" value="F"/><label>F</label><br/>
<label>Téléphone :<input type="tel" name="tel"/></label><br/>
<label>Adresse :<input type="text" name="addr"/></label><br/>
<label>Code Postal :<input type="tel" name="cp"/></label><br/>
<label>Ville :<input type="text" name="ville"/></label><br/>
<label>E-mail :<input type="email" name="mail"/></label><br/>
<input type="submit" value="Valider" />
</form>

</body>

</html>