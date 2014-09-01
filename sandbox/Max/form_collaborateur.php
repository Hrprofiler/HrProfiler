<form method="post" action="traitement_collabo.php">
   <h3>
	 <center>Formulaire Collaborateurs</center>
   </h3>
   
   <p>
	<label>Nom: </label>
	<br /><input type="text" name="nom"id="nom" maxlength="200" />
   </p>
   
    <p>
	<label>Prénom </label>
	<br /><input type="text" name="prenom"id="prenom" maxlength="200" />
   </p>
   
   <p>
	<label>Date de naissance </label>
	<br /><input type="date" name="naissance"id="naissance" maxlength="200" />
   </p>
   
   
   <p>
	<label>Société </label>
	<br /><input type="text" name="societe"id="societe" maxlength="200" />
   </p>
   
   <p>
	<label>Service </label>
	<br /><input type="text" name="service"id="service" maxlength="200" />
   </p>
   
   
   
   <input type="submit" value="Envoyer" id="Submit" name="Submit"/>
   
</form>

<!--
   Un peu d'explication ^^
   - Toujours mettre un id et un name dans les champs input, textarea. 
   - un textarea est toujours un champs "texte libre", pas la peine de rajouter un type="text"
-->