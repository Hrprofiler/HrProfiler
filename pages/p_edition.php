<?php
	include '../includes/header.php';
	include '../includes/fonctions.php';
?>
<div id="p_config_gestion" class="container">
	<div class="row">
		<ul id="menu_p_config" class="nav nav-pills nav-stacked span2">
			<li id="lien1" <?php if ($_GET["form"]=="act_gen" || !$_GET["form"]){ echo'class="active"';}; ?>><a href="p_edition.php?form=act_gen">Activité générique</a></li> 
			<li id="lien2" <?php if ($_GET["form"]=="act_ter"){ echo'class="active"';}; ?>><a href="p_edition.php?form=act_ter">Activité terrain</a></li> 
			<li id="lien3" <?php if ($_GET["form"]=="collab"){ echo'class="active"';}; ?>><a href="p_edition.php?form=collab">Collaborateur</a></li>
			<li id="lien4" <?php if ($_GET["form"]=="comp"){ echo'class="active"';}; ?>><a href="p_edition.php?form=comp">Compétence</a></li>
			<li id="lien5" <?php if ($_GET["form"]=="emploi"){ echo'class="active"';}; ?>><a href="p_edition.php?form=emploi">Emploi</a></li>
			<li id="lien6" <?php if ($_GET["form"]=="portefeuille"){ echo'class="active"';}; ?>><a href="p_edition.php?form=portefeuille">Portefeuille</a></li>
			<li id="lien7" <?php if ($_GET["form"]=="poste"){ echo'class="active"';}; ?>><a href="p_edition.php?form=poste">Poste</a></li>
			<li id="lien8" <?php if ($_GET["form"]=="pro_post"){ echo'class="active"';}; ?>><a href="p_edition.php?form=pro_post">Profil de poste</a></li>
			
		</ul>
		<div id="contenu_p_config_gestion" class="span10">
			<?php

				if ($_GET["form"]=="act_gen"){
					include 'edition/tables/form_act_gen.php';
				}
				elseif($_GET["form"]=="act_ter"){
					include 'edition/tables/form_act_ter.php';
				}
				elseif($_GET["form"]=="collab"){
					include 'edition/tables/form_collaborateur.php';
				}
				elseif($_GET["form"]=="comp"){
					include 'edition/tables/form_competence.php';
				}
				elseif($_GET["form"]=="emploi"){
					include 'edition/tables/form_emploi.php';
				}
				elseif($_GET["form"]=="portefeuille"){
					include 'edition/tables/form_portefeuille.php';
				}
				elseif($_GET["form"]=="poste"){
					include 'edition/tables/form_poste.php';
				}
				elseif($_GET["form"]=="pro_post"){
					include 'edition/tables/form_pp.php';
				}
				else{
					include 'edition/tables/form_act_gen.php';
				}
			?>
		</div>
	</div>
	
</div>
<script>
$("#menu_p_config li" ).click(function() {
	$( "#menu_p_config li" ).removeClass("active");
	$( this ).addClass("active");	
});
</script>
<?php
	include '../includes/bottom.php';
?>