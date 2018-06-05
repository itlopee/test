<!DOCTYPE html >
<html>
	<head>
		<meta charset="utf-8" />
		<title>Page principale</title>
		<link rel="stylesheet" href="cdds.css"/>
	</head>
	<body>
		<?php //modiffication de la table categorie
			include("log.php");
			$IdC = $_GET['var1'];
				$bdd = $pdo->prepare
				("SELECT *
				FROM categorie
				WHERE IdC LIKE '$IdC'");
				$bdd->execute();//récupération des donnéss
				if ($donnees = $bdd->fetch())
				{
					$Categorie = $donnees['kategorie'];
				}
			if(isset($_GET['Valid']))
			{
				if(!empty($_GET['Categorie']))
					$Categorie = $_GET['Categorie'];
				$base = $pdo->prepare
				("UPDATE categorie
				SET kategorie = '$Categorie'
				WHERE IdC = ' $IdC '");
				$base->execute();
				echo '<div class="alert alert-dismissable alert-success"><meta http-equiv="refresh" content="0; URL=principal.php?#"></div>';
			}
			if (isset($_POST['Supprimer']))//supression
				{
						$Supprimer = $pdo->prepare( "DELETE FROM categorie WHERE IdC = '$IdC'");
						$Supprimer->execute();
				echo '<div class="alert alert-dismissable alert-success"><meta http-equiv="refresh" content="0; URL=principal.php?#"></div>';
				}
		?>
		<form>
			<input type="text" class="form-control" name="Categorie" placeholder="<?php echo $Categorie?>"/>
			<input type="submit" class="form-control" name="Valid" placeholder="Valider"/>
			<input type="hidden" name="var1" value="<?php echo "".$IdC."" ?>"></input>
			<input type="submit" name='Supprimer' value="Supprimer">
		</form>
		<?php
			
		?>
	</body>
</html>