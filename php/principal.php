<!DOCTYPE html >
<html>
	<head>
		<meta charset="utf-8" />
		<title>Page principale</title>
		<link rel="stylesheet" href="cdds.css"/>
	</head>
	<body class="flex">
		<?php 
			session_start();
			if(!isset($_SESSION['Identifiant']))
			{
				echo 'Vous n\'êtes pas connecté, accés interdit ! <meta http-equiv="refresh" content="2; URL=connection.php"> ';
			}
			else
			{
				include("log.php");//connection a la base de donnees
				include("page.php");//affichage du bandeau sur le coté
						?>
				<div class="bdds">
					<!--barre de recherche-->
					<form class="barre",method="get">
						<input type="search" placeholder="Entré votre recherche" class="recherche"/>
						<input type="submit" value="Rechercher" class="rechercher" href="#"/>
					</form>
					<div class="bdd"></div>
				</div><?php
			}
		?><!-- scipt Javascript en JQuery -->
		<script src="jquery.js"></script>
		<script>
			$(function() {
				$('.rechercher').click(function() {
					var param = 'l=' + $('.recherche').val();
					$('.bdd').load('bdd.php',param, function(){
					});
				});
				$('.base').click(function() {
					var param = 'l=' + $('.recherche').val();
					$('.bdd').load('bdd.php',param, function(){
					});
				});
				$('.produit').click(function() {
					var param = 'l=' + $('.recherche').val();
					$('.bdd').load('produit.php',param, function(){
					});    
				});
				$('.acces').click(function() {
					var param = 'l=' + $('.recherche').val();
					$('.bdd').load('Droit_acces.php',param, function(){
					});    
				});
				$('.categorie').click(function() {
					var param = 'l=' + $('.recherche').val();
					$('.bdd').load('Categorie2.php',param, function(){
					});    
				});
				$('.marque').click(function() {
					var param = 'l=' + $('.recherche').val();
					$('.bdd').load('marque2.php',param, function(){
					});    
				});
			});
		</script>
	</body>
</html>