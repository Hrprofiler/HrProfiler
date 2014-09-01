<?php
	include '../includes/header.php';
	include '../includes/fonctions.php';
?>
<div id="p_config_gestion" class="container">
	<div class="row">
		<ul id="menu_p_config" class="nav nav-pills nav-stacked span2">
			<li id="lien1" class="active"><a href="p_config_gestion.php">Utilisateurs</a></li> 
			<li id="lien2" ><a href="p_config_gestion2.php">Groupes</a></li>
		</ul>
		<div id="contenu_p_config_gestion" class="span10">
			<?php 
				include 'configuration/gestion/gestion_utilisateurs.php';
			?>
		</div>
	</div>
	
</div>
<script>
$( "#lien1" ).click(function() {
$( this ).addClass("active");
$( "#lien2" ).removeClass("active");/*
$( "#conteneur_gestion_groupes" ).removeClass("visible");
$( "#conteneur_gestion_utilisateurs" ).addClass("visible");*/
});
$( "#lien2" ).click(function() {
$( this ).addClass("active");
$( "#lien1" ).removeClass("active");/*
$("#conteneur_gestion_groupes" ).addClass("visible");
$("#conteneur_gestion_utilisateurs" ).removeClass("visible");*/
});
</script>
<?php
	include '../includes/bottom.php';
?>