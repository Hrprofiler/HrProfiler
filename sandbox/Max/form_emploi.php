<form method="post" action="traitement_emploi.php">
   <h3>
	 <center>Formulaire Emploi</center>
   </h3>
   
   <p>
	<label>Libellé Emploi : </label>
	<br /><input type="text" name="Libemploi"id="Libemploi" maxlength="200" />
   </p>
   
   <p>
	<label>Description Emploi : </label>
	<br /><textarea name="Descemploi" id="Descemploi" maxlength="200" /></textarea> 
   </p>
   
   <input type="submit" value="Envoyer" id="Submit" name="Submit"/>
   
</form>

<!--
   Un peu d'explication ^^
   - Toujours mettre un id et un name dans les champs input, textarea. 
   - un textarea est toujours un champs "texte libre", pas la peine de rajouter un type="text"
-->