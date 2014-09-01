<form method="post" action="traitement_act_gen.php">
   <h3>
	 <center>Formulaire Activit� G�n�rique</center>
   </h3>
   
   <p>
	<label>Libell� Activit� G�n�rique : </label>
	<br /><input type="text" name="LibActgen"id="LibActgen" maxlength="200" />
   </p>
   
   <p>
	<label>Description Activité Générique : </label>
	<br /><textarea name="DescActgen" id="DescActgen" maxlength="200" /></textarea> 
   </p>
   
   <input type="submit" value="Envoyer" id="Submit" name="Submit"/>
   
</form>

<!--
   Un peu d'explication ^^
   - Toujours mettre un id et un name dans les champs input, textarea. 
   - un textarea est toujours un champs "texte libre", pas la peine de rajouter un type="text"
-->