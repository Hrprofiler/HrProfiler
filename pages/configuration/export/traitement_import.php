<!DOCTYPE html> <!-- ************** DEBUT DU HEADER **************  -->
<?php

	include '../../../includes/header.php';

	include '../../../includes/fonctions.php';
?>
<head>
	<link rel="stylesheet" href="import-export.css" />
	<title>HR-Profiler - Import/Export</title>
</head>
<div id="my-tab-content" class="tab-content">
	<center>
		<div id="resultat" class="container">
			<?php include 'traitement_import_csv.php'; ?>
		</div>
	</center>
</div>