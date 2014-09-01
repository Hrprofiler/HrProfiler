<form method="post" action="import.php" enctype="multipart/form-data">
     <p>
	<h4>Choix de la table :</h4><br />
	<label>Collaborateurs
    <input type="radio" name="table" value="collaborateur" /></label><br />
    <label>Emplois
    <input type="radio" name="table" value="emploi" /></label><br />
    <label>Compétences
    <input type="radio" name="table" value="competence" /></label><br />
    <label>Postes
    <input type="radio" name="table" value="poste" /></label><br />
    <label>Profils de poste
    <input type="radio" name="table" value="profil_poste" /></label><br />
    <label>Activités génériques
    <input type="radio" name="table" value="activite_generique" /></label><br />
    <label>Activités terrain
    <input type="radio" name="table" value="activite_terrain" /></label><br />
    <label>Utilisateurs
    <input type="radio" name="table" value="utilisateur" /></label><br />
    <label>Groupes
    <input type="radio" name="table" value="groupe" /></label><br /><br />
	 </p>
	 <label for="fichier"><h4>FICHIER CSV:</h4></label><br />
     <input type="file" name="fichier" id="fichier" /><br />
	 <input type="submit" name="submit" value="Envoyer" />
</form>