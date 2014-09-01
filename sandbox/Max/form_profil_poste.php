<form method="post" action="traitement_profil_poste.php">
   <h3>
	 <center>Formulaire Profil de poste</center>
   </h3>
   
   <p>
	<label>Libellé Profil de poste : </label>
	<br /><input type="text" name="Libprofil"id="Libprofil" maxlength="200" />
   </p>
   
   
   <input type="submit" value="Envoyer" id="Submit" name="Submit"/>
   
</form>

<!--
   Un peu d'explication ^^
   - Toujours mettre un id et un name dans les champs input, textarea. 
   - un textarea est toujours un champs "texte libre", pas la peine de rajouter un type="text"
-->