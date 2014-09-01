<form method="post" action="traitement_act_ter.php">
   <h3>
	 <center>Formulaire Activité Terrain</center>
   </h3>
   
   <p>
	<label>Libellé Activité Terrain : </label>
	<br /><input type="text" name="LibActter"id="LibActter" maxlength="200" />
   </p>
   
   <p>
	<label>Description Activité Terrain : </label>
	<br /><textarea name="DescActter" id="DescActter" maxlength="200" /></textarea> 
   </p>
   
   <input type="submit" value="Envoyer" id="Submit" name="Submit"/>
   
</form>

<!--
   Un peu d'explication ^^
   - Toujours mettre un id et un name dans les champs input, textarea. 
   - un textarea est toujours un champs "texte libre", pas la peine de rajouter un type="text"
-->