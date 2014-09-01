<?php
	include '../includes/header.php';
	include '../includes/fonctions.php';
?>
<script type='text/javascript'>
 
	function getXhr(){
                        var xhr = null; 
		if(window.XMLHttpRequest) // Firefox et autres
		   xhr = new XMLHttpRequest(); 
		else if(window.ActiveXObject){ // Internet Explorer 
		   try {
	                xhr = new ActiveXObject("Msxml2.XMLHTTP");
	            } catch (e) {
	                xhr = new ActiveXObject("Microsoft.XMLHTTP");
	            }
		}
		else { // XMLHttpRequest non supportÃ© par le navigateur 
		   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
				   xhr = false; 
				} 
                                return xhr;
			}
 
			/**
	* MÃ©thode qui sera appelÃ©e sur le click du bouton
	*/
	function go(id,affichage,niveau,table){
		
		var xhr = getXhr();
		// On dÃ©fini ce qu'on va faire quand on aura la rÃ©ponse
		xhr.onreadystatechange = function(){
			// On ne fait quelque chose que si on a tout reÃ§u et que le serveur est ok
			if(xhr.readyState == 4 && xhr.status == 200){
				leselect = xhr.responseText;
				// On se sert de innerHTML pour rajouter les options a la liste
				document.getElementById('donnees'+niveau).innerHTML = leselect;
				for (var i=0;i<document.getElementsByName('niveau'+niveau).length;i++){
    					document.getElementsByName('niveau'+niveau)[i].className=null;
					}
					switch(niveau)
				{
					case 0:
						document.getElementById('donnees'+(niveau+1)).innerHTML = null;
						document.getElementById('donnees'+(niveau+2)).innerHTML = null;
						document.getElementById('donnees'+(niveau+3)).innerHTML = null;
						break;
					case 1:
						sel = document.getElementById(affichage);
						$( sel ).addClass("active");	
						document.getElementById('donnees'+(niveau+1)).innerHTML = null;
						document.getElementById('donnees'+(niveau+2)).innerHTML = null;
						break;
					case 2:
						sel = document.getElementById(affichage);
						$( sel ).addClass("active");
						document.getElementById('donnees'+(niveau+1)).innerHTML = null;
						break;
					case 3:
						sel = document.getElementById(affichage);
						$( sel ).addClass("active");
						break;
				}
				
					}
				}
 
				// Ici on va voir comment faire du post
		xhr.open("POST","ajaxCarto.php",true);
		// ne pas oublier Ã§a pour le post
		xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		// ne pas oublier de poster les arguments
		// ici, l'id de l'auteur
		sel = document.getElementById('donnees'+niveau);
		//alert(element.id);
		xhr.send("liaison="+id+"&niveau="+niveau+"&table="+table);
		
	}

$( document ).ready(function () { // this has to be done after the document has been rendered
    $("[data-toggle='tooltip']").tooltip({html: true}); // enable bootstrap 3 tooltips
    $('[data-toggle="popover"]').popover({
        trigger: 'hover',
        'placement': 'top',
        'show': true
    });
});
</script>
<?php

$connexion =getDbConnexion();

//on rÃ©cup la liste des tables
$ListeTables=$connexion->query("show tables");
$Tables= array();
$TablesLiaison= array();
while ($row = $ListeTables->fetch(PDO::FETCH_OBJ)) {
	if(strpos($row->Tables_in_hrprofil_bdd,"Lien_")!='NULL') {
		array_push($Tables,$row->Tables_in_hrprofil_bdd);	
		
	}
	else{
		array_push($TablesLiaison,$row->Tables_in_hrprofil_bdd);
		
	}
} 
?>
<div id="p_cartographie" class="container">
	<div class="colonne_carto">
		<p class="muted">Nom de la table</p>
		<ul id="choix_table" name='table' class="nav nav-pills nav-stacked pull-left">
			<?php
			foreach($Tables as $table)
			{
			    if(strpos($table ,'_')!='NULL') {
			    	$libelle= str_replace('_', ' ', $table);
			    }
				else{
					$libelle=$table;
				}
				if($table=='Groupe'|| $table=='Utilisateur' || $table=='Liaisons'){
					
				}
				else{
					echo '<li onclick="go(0,0,0,'."'".$table."'".')"><a>'.$libelle.'</a></li>';
				}		
			}
			?>
		</ul>	
	</div>	
	<div class="colonne_carto">				
		<p class="muted">Elements de la table</p>
		<ul id="donnees0" name="donnees0" class="nav nav-pills nav-stacked pull-left">
		</ul>
	</div>
	<div class="colonne_carto">				
		<p class="muted">Liaisons</p>
		<ul id="donnees1" name="donnees1" class="nav nav-pills nav-stacked pull-left">
		</ul>
	</div>
	<div class="colonne_carto">				
		<p class="muted"> </p>
		<ul id="donnees2" name="donnees2" class="nav nav-pills nav-stacked pull-left">
		</ul>
	</div>
	<div class="colonne_carto">				
		<p class="muted"> </p>
		<ul id="donnees3" name="donnees3" class="nav nav-pills nav-stacked pull-left">
		</ul>
	</div>
</div>
<script>
$("#choix_table li" ).click(function() {
	$( "#choix_table li" ).removeClass("active");
	$( this ).addClass("active");	
});

$("#donnees0 li" ).click(function() {
	$( "#donnees0 li" ).removeClass("active");
	$( this ).addClass("active");	
});

$("#donnees1 li" ).click(function() {
	$( "#donnees1 li" ).removeClass("active");
	$( this ).addClass("active");	
});

$("#donnees2 li" ).click(function() {
	$( "#donnees2 li" ).removeClass("active");
	$( this ).addClass("active");	
});

$("#donnees3 li" ).click(function() {
	$( "#donnees2 li" ).removeClass("active");
	$( this ).addClass("active");	
});

</script>
<?php
	include '../includes/bottom.php';
?>