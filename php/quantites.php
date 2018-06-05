<!DOCTYPE html >
<html>
	<head>
		<meta charset="utf-8" />
		<title>Page principale</title>
		<link rel="stylesheet" href="cdds.css"/>
	</head>
	<body>
		<?php //page de moddification de quantité
			include("log.php");
			$IdS = $_GET["var1"];
			$bdd = $pdo->prepare
				("SELECT *
				FROM stockage
				WHERE IdS LIKE '$IdS'");
			$bdd->execute();
			if ($donnees = $bdd->fetch())
			{
				$Quantites = $donnees['Quantites'];
			}
			if(isset($_GET['Valid']))//si le bonton valider a été cliqué
			{
				if(!empty($_GET['Quantites']))
					$Quantites = $_GET['Quantites'];
				$base = $pdo->prepare
				("UPDATE stockage
				SET Quantites = '$Quantites'
				WHERE IdS = '$IdS'");
				$base->execute();//modification
				echo '<div class="alert alert-dismissable alert-success"><meta http-equiv="refresh" content="0; URL=principal.php?#"></div>';
			}
		?>
		<form>
			<input type="text" class="form-control" name="Quantites" placeholder="<?php echo $Quantites?>"/>
			<input type="submit" class="form-control" name="Valid" placeholder="Valider"/>
			<input type="hidden" name="var1" value="<?php echo "".$IdS."" ?>"></input>
		</form>
	</body>
</html>