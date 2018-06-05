<!DOCTYPE html >
<html>
	<head>
		<meta charset="utf-8" />
		<title>Page principale</title>
		<link rel="stylesheet" href="cdds.css"/>
	</head>
	<body>
		<?php //page d'ajout d'un élément dans l'une des tables de la bdd
			include("log.php");
			$ajout = $_GET["ajout"];
			$Date = date("Y-m-d");
			$Heure = date("H:i:s");
			if($ajout == "stockage")//en fonction de quel table va etre ajouter
			{
				$Ajouter = $pdo->prepare("INSERT  INTO stockage (Objet, Marque, Categorie, Code_barre, Quantites, prix_achat, prix_vente, Date, Heure)
				VALUES ('Change', '0', '0','0', '0', '0', '0', '$Date', '$Heure')");
				$ID = "IdS";
			}	
			elseif($ajout == "login")
			{
				$Ajouter = $pdo->prepare("INSERT  INTO login (Identifiant, Password, Droit_acces)
				VALUES ('abcd', '1234', '1')");
				$ID = "IdL";
			}
			elseif($ajout == "marque")
			{
				$Ajouter = $pdo->prepare("INSERT  INTO marque (narque)
				VALUES ('change')");
				$ID = "IdM";
			}
			elseif($ajout == "categorie")
			{
				$Ajouter = $pdo->prepare("INSERT  INTO categorie (kategorie)
				VALUES ('change')");
				$ID = "IdC";
			}
			$Ajouter->execute();
			$bdd = $pdo->prepare("SELECT * FROM ".$ajout." ORDER BY ".$ID." DESC LIMIT 1");
			$bdd->execute();
			$ajout = $ajout.".php";
			if($donnees = $bdd->fetch())
			{ 
			?>
			<th><a href=" <?php echo ("$ajout?var1=".$donnees[$ID]) ; ?>" ><button type="submit">Ajouter</button></a></th>
			<?php }?>
			
	</body>
</html>