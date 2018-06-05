<!DOCTYPE html >
<html>
	<head>
		<meta charset="utf-8" />
		<title>Page principale</title>
		<link rel="stylesheet" href="cdds.css"/>
	</head>
	<body>
		<?php //page de modification du login
			include("log.php");
			$IdL = $_GET['var1'];//on recupere l'id a modiffier
				$bdd = $pdo->prepare
				("SELECT *
				FROM login
				WHERE IdL LIKE '$IdL'");
				$bdd->execute();//on recupere les éléments afin de les garder si on ne veut pas les moddifiers
				if ($donnees = $bdd->fetch())
				{
					$login = $donnees['Identifiant'];
					$Password = $donnees['Password'];
					$Droit_acces = $donnees['Droit_acces'];
				}
			if(isset($_GET['Valid']))
			{
				if(!empty($_GET['login']))
					$login = $_GET['login'];
				if(!empty($_GET['Password']))
				{
					$Password = $_GET['Password'];
					$Password = hash("sha256", $Password);
				}
				if(!empty($_GET['Droit_acces']))
					$Droit_acces = $_GET['Droit_acces'];
				$base = $pdo->prepare
				("UPDATE login
				SET Identifiant = '$login', Password = '$Password', Droit_acces = '$Droit_acces'
				WHERE IdL = ' $IdL '");
				$base->execute();//on fait les modifications
				echo '<div class="alert alert-dismissable alert-success"><meta http-equiv="refresh" content="0; URL=principal.php?#"></div>';
			}
			if (isset($_POST['Supprimer']))//on prépare la suppression
				{
						$Supprimer = $pdo->prepare( "DELETE FROM login WHERE IdL = '$IdL'");
						$Supprimer->execute();
						echo '<div class="alert alert-dismissable alert-success"><meta http-equiv="refresh" content="0; URL=principal.php?#"></div>';
				}
		?>
		<form>
			<input type="text" class="form-control" name="login" placeholder="<?php echo $login?>"/>
			<input type="text" class="form-control" name="Password" placeholder="<?php echo $Password?>"/>
			<input type="text" class="form-control" name="Droit_acces" placeholder="<?php echo $Droit_acces?>"/>
			<input type="submit" class="form-control" name="Valid" placeholder="Valider"/>
			<input type="hidden" name="var1" value="<?php echo "".$IdL."" ?>"></input>
			<input type="submit" name='Supprimer' value="Supprimer">
		</form>
		<?php
			
		?>
	</body>
</html>