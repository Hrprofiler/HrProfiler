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
	<link href="http://hr-profiler.fr/includes/css/bootstrap.css" rel="stylesheet">
	<link href="http://hr-profiler.fr/includes/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://hr-profiler.fr/includes/css/bootstrap-responsive.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
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
	<div id="entete"> 
		<div id="logo">
			<a href="//hr-profiler.fr"></a>
			
		</div>
		<div id="profil">
			<?php if(isset($_SESSION['id'])) {
				?> 
			<a href="pages/deconnexion.php" class="btn btn-default navbar-btn">Déconnexion</a>
			<?php
			} 
			?>
		</div>
		<?php
		include 'menu.php';
		//var_dump($_SERVER['PHP_SELF']);
		/*if ($_SERVER['PHP_SELF']=="/index.php"){
			include 'includes/menu.php';		
		}
		else{
			include '../includes/menu.php';			
		}*/
		?>
	</div>