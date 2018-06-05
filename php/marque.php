<!DOCTYPE html >
<html>
	<head>
		<meta charset="utf-8" />
		<title>Page principale</title>
		<link rel="stylesheet" href="cdds.css"/>
	</head>
	<body>
		<?php //modification de la table marque
			include("log.php");
			$IdM = $_GET['var1'];
				$bdd = $pdo->prepare
				("SELECT *
				FROM marque
				WHERE IdM LIKE '$IdM'");
				$bdd->execute();//on récupère les éléments a garder
				if ($donnees = $bdd->fetch())
				{
					$Marque = $donnees['narque'];
				}
			if(isset($_GET['Valid']))
			{
				if(!empty($_GET['Marque']))
					$Marque = $_GET['Marque'];
				$base = $pdo->prepare
				("UPDATE marque
				SET narque = '$Marque'
				WHERE IdM = ' $IdM '");
				$base->execute();//modiffication
				echo '<div class="alert alert-dismissable alert-success"><meta http-equiv="refresh" content="0; URL=principal.php?#"></div>';
			}
			if (isset($_POST['Supprimer']))//supression
				{
						$Supprimer = $pdo->prepare( "DELETE FROM marque WHERE IdM = '$IdM'");
						$Supprimer->execute();
						echo '<div class="alert alert-dismissable alert-success"><meta http-equiv="refresh" content="0; URL=principal.php?#"></div>';
				}
		?>
		<form>
			<input type="text" class="form-control" name="Marque" placeholder="<?php echo $Marque?>"/>
			<input type="submit" class="form-control" name="Valid" placeholder="Valider"/>
			<input type="hidden" name="var1" value="<?php echo "".$IdM."" ?>"></input>
			<input type="submit" name='Supprimer' value="Supprimer">
		</form>
		<?php
			
		?>
	</body>
</html>