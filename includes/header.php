<?php
   /*session_start();
    // Si la variable de session n'existe pas
    if(!isset($_SESSION['id'])) {
        // On redirige l'utilisateur vers une page de login
        //var_dump($_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'] );
		if ($_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'] !="hr-profiler.fr/index.php"){
			header("Location: http://hr-profiler.fr");
		}
    }*/
 
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8"/>
	<title>HR-Profiler</title>
	<!--<script src="../includes/js/bootstrap.js"></script>-->
	 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://hr-profiler.fr/includes/js/jquery.js"></script>
	<script src="http://hr-profiler.fr/includes/js/jcanvas.js"></script>
	<link href="http://hr-profiler.fr/includes/css/global.css" rel="stylesheet" type="text/css">
	<!--<link href="http://hr-profiler.fr/includes/css/bootstrap.css" rel="stylesheet">-->
	<link href="http://hr-profiler.fr/includes/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://hr-profiler.fr/includes/css/bootstrap-responsive.css" rel="stylesheet">
	<script src="../includes/js/bootstrap.js"></script>
	<!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">-->
	 <script language="JavaScript">
		function show(h) {
			var el = document.getElementById('output'); 
			el.innerHTML = h;
			el.style.display="";
		}
		function show2(h) {
			var el = document.getElementById('output2'); 
			el.innerHTML = h;
			el.style.display="";
		}
		
		function hide() {
			var el = document.getElementById('output'); 
			el.innerHTML = "";
			el.style.display="";
		}
		function hide2() {
			var el = document.getElementById('output2'); 
			el.innerHTML = "";
			el.style.display="";
		}
	</script>

</head>
<body>
	<div id="entete_hr">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div id="menu_site" class="container-fluid">
				<ul class="nav navbar-nav">
					<li id="logo_min" ><a href="//hr-profiler.fr"></a></li>
					<li <?php if ($_SERVER['PHP_SELF']=="/pages/p_cartographie.php"){?>class='active'<?php } ?>><a href="//hr-profiler.fr/pages/p_cartographie.php">Cartographie</a></li>
				    <li <?php if ($_SERVER['PHP_SELF']=="/pages/p_edition.php"){?>class='active'<?php } ?>><a href="//hr-profiler.fr/pages/p_edition.php">Edition</a></li>
				    <li <?php if ($_SERVER['PHP_SELF']=="/pages/p_config_gestion.php" || $_SERVER['PHP_SELF']=="/pages/p_config_gestion2.php" ){?>class='active'<?php } ?>><a href="//hr-profiler.fr/pages/p_config_gestion.php">Configuration</a></li>
				    <li <?php if ($_SERVER['PHP_SELF']=="/pages/p_import_export.php"){?>class='active'<?php } ?>><a href="//hr-profiler.fr/pages/p_import_export.php">Import/Export</a></li>
				</ul>
		</div>
		</nav>
	</div>
		<?php
		//var_dump($_SERVER['PHP_SELF']);
		/*if ($_SERVER['PHP_SELF']=="/index.php"){
			include 'includes/menu.php';		
		}
		else{
			include '../includes/menu.php';			
		}*/
		?>