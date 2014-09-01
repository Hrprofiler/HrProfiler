<!DOCTYPE html> <!-- ************** DEBUT DU HEADER **************  -->
<?php

	include '../includes/header.php';

	include '../includes/fonctions.php';

?>
<head>
	<link rel="stylesheet" href="configuration/export/import-export.css" />
</head>
<div id="content" class="" ><!-- CONTENT -->
	<ul id="menu_p_config" class="nav nav-pills nav-stacked span2">
		<li class="active"><a href="#import" data-toggle="tab">Import</a></li>
        <li><a href="#export" data-toggle="tab">Export</a></li>
	</ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="import"><!-- MODULE IMPORT -->
				<form method="post" action="configuration/export/traitement_import.php" enctype="multipart/form-data" id="liste_table_import"><!-- FORMULAIRE IMPORT -->
					<legend>Insertion de données dans HRProfiler<hr/></legend>
					<span style="font-weight:bold;">Type d'import : </span>
					<div class="btn-group" data-toggle-name="is_private" data-toggle="buttons-radio"><!-- Boutons de selection SQL/CSV -->
					 <!--  <button type="button" value="importSQL" class="btn btn-info" data-toggle="button" onclick="$('#importSQL').toggle(true); $('#importCSV').toggle(false);" >SQL</button>-->
					  <button type="button" value="importCSV" class="btn btn-info btn-small" data-toggle="button" onclick="$('#importCSV').toggle(true); $('#importSQL').toggle(false);" >CSV</button>
					</div>
					<div class="radio" id="importCSV">
					<br />
					<span style="font-weight:bold;">Selection de la table :<span>
						<div id="listeInsertion">
							<label>Collaborateurs
								<input type="radio" name="table" value="Collaborateur" checked /></label>
							<label>Emplois
								<input type="radio" name="table" value="Emploi" /></label>
							<label>Compétences
								<input type="radio" name="table" value="Competence" /></label>
							<label>Postes
								<input type="radio" name="table" value="Poste" /></label>
							<label>Profils de poste
								<input type="radio" name="table" value="Profil_poste" /></label>
							<label>Activités génériques
								<input type="radio" name="table" value="Activite_generique" /></label>
							<label>Activités terrain
								<input type="radio" name="table" value="Activite_terrain" /></label>
							<label>Utilisateurs
								<input type="radio" name="table" value="Utilisateur" /></label>
							<label>Groupes
								<input type="radio" name="table" value="Groupe" /></label><br />
						</div>
							<input id="fromfile" name="fichier" type="file" style="display:none">
							<span style="font-weight:bold;">Selection du fichier à importer :</span><br/>
								<div class="input-append">
									<input id="importfile" class="input-large" type="text" style="height: 16px; margin-left:60px;">
									<a class="btn btn-info btn-small" onclick="$('input[id=fromfile]').click();">Parcourir</a>
								</div>
							</input><br /><br />
					<center><button type="submit" name="submit" class="btn btn-success">Envoyer <i class="icon-white icon-ok"></i></button></center>
					</div>
				</form>
        </div>
		
		
        <div class="tab-pane" id="export"><!-- MODULE EXPORT -->
			<legend> Extraction des données HRProfiler<hr/></legend>
			<span style="font-weight:bold;">Mode d'extraction : </span><!-- Boutons de selection pour export global ou spécifique -->
			<div class="btn-group" data-toggle-name="is_private" data-toggle="buttons-radio">
			  <button type="button" value="allTable" class="btn btn-info btn-small" data-toggle="button" onclick="$('#liste_table').toggle(false); $('#all_table').toggle(true);">Exporter toute la base</button>
			  <button type="button" value="selectTable" class="btn btn-info btn-small" data-toggle="button" onclick="$('#liste_table').toggle(true); $('#all_table').toggle(false);" >Selection des tables</button>
			</div>
			<br /><br />
			<form role="form" method="post" action="configuration/export/traitement_export_all.php" id="all_table">
				<span style="font-weight:bold;">Format d'export : </span><!-- Boutons de selection SQL/CSV pour base entière-->
					<div class="btn-group" data-toggle-name="is_private" data-toggle="buttons-radio" style="margin-left: 16px;">
						<button type="button" value="Yes" class="btn btn-info btn-small" data-toggle="button" onclick="document.getElementById('type_export_all').value='SQL' " >SQL</button>
						<button type="button" value="Yes" class="btn btn-info btn-small" data-toggle="button" onclick="document.getElementById('type_export_all').value='CSV' " >CSV</button>
					</div>
					<input type="hidden" id="type_export_all" name="type_export_all" value="temp" />
				<br /><br />
			<center><button type="submit" class="btn btn-success">Exporter la base de données <i class="icon-white icon-ok"></i></button></center>
			</form>
			<form role="form" method="post" action="configuration/export/traitement_export_liste.php" id="liste_table"  onsubmit="return checkCheckBoxes(this);">
				<span style="font-weight:bold;">Selection des tables à exporter :</span>
				<div class="checkbox" id="checkboxlistetable"><!-- Liste des tables -->
					<label>Collaborateurs
						<input type="checkbox" name="collaborateur" value="Yes" /></label>
					<label>Emplois
						<input type="checkbox" name="emploi" value="Yes" /></label>
					<label>Compétences
						<input type="checkbox" name="competence" value="Yes" /></label>
					<label>Postes
						<input type="checkbox" name="poste" value="Yes" /></label>
					<label>Profils de poste
						<input type="checkbox" name="profil_poste" value="Yes" /></label>
					<label>Activités génériques
						<input type="checkbox" name="activite_generique" value="Yes" /></label>
					<label>Activités terrain
						<input type="checkbox" name="activite_terrain" value="Yes" /></label>
					<label>Utilisateurs
						<input type="checkbox" name="utilisateur" value="Yes" /></label>
					<label>Groupes
						<input type="checkbox" name="groupe" value="Yes" /></label>
				</div>
				<br />
				<span style="font-weight:bold;">Format d'export : </span><!-- Boutons de selection SQL/CSV pour liste -->
					<div class="btn-group" data-toggle-name="is_private" data-toggle="buttons-radio" style="margin-left: 17px;">
					  <button type="button" value="Yes" class="btn btn-info btn-small" data-toggle="button" onclick="document.getElementById('type_export_list').value='SQL' " >SQL</button>
					  <button type="button" value="Yes" class="btn btn-info btn-small" data-toggle="button" onclick="document.getElementById('type_export_list').value='CSV' " >CSV</button>
					</div>
					<input type="hidden" id="type_export_list" name="type_export_list" value="temp" />
				<br /><br />
			<center><button type="submit" class="btn btn-success" onclick="if(!this.form.checkbox.Yes){alert('You must agree to the terms first.');return false}">Exporter les tables <i class="icon-white icon-ok"></i></button></center>
			</form>
        </div>

    </div>
		<button type="button" data-toggle="modal" class="btn btn-warning btn-small" data-target="#help" id="buttonHelp">Besoin d'aide ?</button>
		<!-- Modal -->
		<div class="modal fade helper" id="help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title" id="myModalLabel">Aide - Comment utiliser le module d'import/export ?</h4>
			  </div>
			  <div class="modal-body">
				<h4 >Fonctionnement de l'import</h4>
				<p >
				Ad in multis ad vere inferos viderit vesperum ex hoc fuit tamen viderit quam superos fortuna pervenisse rem dicere difficile videtis difficile tamen gradu moriendi genere sensum P diem autem patribus e gloria pridie celeritas illum videatur mortis fuisse cum.
				</p>
				<h4 >Fonctionnement de l'export</h4>
				<p >
				Ad in multis ad vere inferos viderit vesperum ex hoc fuit tamen viderit quam superos fortuna pervenisse rem dicere difficile videtis difficile tamen gradu moriendi genere sensum P diem autem patribus e gloria pridie celeritas illum videatur mortis fuisse cum.
				</p>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Fermer</button>
			  </div>
			</div>
		  </div>
		</div>
		
		</div><!-- container -->

<script type="text/javascript">
	$('#liste_table').hide();
	$('#all_table').hide();
	$('#importCSV').hide();

	//fonction de style pour bouton input file (import)
	$('input[id=fromfile]').change(function() {
		$('#importfile').val($(this).val());
	});
	
	//fonction pour remettre en place la modale au click sur le bouton besoin d'aide
	$("#buttonHelp").click(function(){
	   $("#help").removeClass('helper');
	});
</script>
<script type="text/javascript" language="JavaScript">
<!--
function checkCheckBoxes(theForm) {
	if (
	theForm.collaborateur.checked == false &&
	theForm.emploi.checked == false &&
	theForm.competence.checked == false &&
	theForm.poste.checked == false &&
	theForm.profil_poste.checked == false &&
	theForm.activite_terrain.checked == false &&
	theForm.activite_generique.checked == false &&
	theForm.utilisateur.checked == false &&
	theForm.groupe.checked == false)
	{
		alert ('Merci de selectionner au moins une table !');
		return false;
	} else { 	
		return true;
	}
}

-->
</script> 
 <script>
	$(function(){ 
		$(".tooltip-link").tooltip();
	});
</script>

<script type="text/javascript" src="../../includes/js/bootstrap.js"></script>

<?php

	include '../includes/bottom.php';

?>