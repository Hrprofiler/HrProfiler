<form method="post" action="traitement_portefeuille.php">
   <h3>
	 <center>Formulaire Portefeuille de comp�tences</center>
   </h3>
   
   <p>
	<label>Libell� Portefeuille de comp�tences : </label>
	<br /><input type="text" name="Libportefeuille"id="Libemploi" maxlength="200" />
   </p>
   
   
   <input type="submit" value="Envoyer" id="Submit" name="Submit"/>
   
</form>

<!--
   Un peu d'explication ^^
   - Toujours mettre un id et un name dans les champs input, textarea. 
   - un textarea est toujours un champs "texte libre", pas la peine de rajouter un type="text"
-->