




<form method="post" action="traitement_poste.php">
   <h3>
	 <center>Formulaire Poste</center>
   </h3>
   
   <p>
	<label>Libell� Poste : </label>
	<br /><input type="text" name="Libposte"id="Libposte" maxlength="200" />
   </p>
   
   <p>
	<label>Description Poste : </label>
	<br /><textarea name="Descposte" id="Descposte" maxlength="200" /></textarea> 
   </p>
   
   <p>
   <INPUT type="checkbox" name="occupe" value="1"> occup�
   </p>
   
   
   <input type="submit" value="Envoyer" id="Submit" name="Submit"/>
   
</form>

<!--
   Un peu d'explication ^^
   - Toujours mettre un id et un name dans les champs input, textarea. 
   - un textarea est toujours un champs "texte libre", pas la peine de rajouter un type="text"
-->