<!DOCTYPE html >
<html>
	<head>
		<meta charset="utf-8" />
		<title>Login</title>
		<link rel="stylesheet" href="cdds.css"/>
	</head>
	
	
	<body>
		<form class="post",method="get"><!--c'est le formulaire de connection-->
				<input type="text" class="form-control" name="Identifiant" placeholder="Identifiant"></br>
				<input type="Password" class="form-control" name="Password" placeholder="Mot de passe"></br>
				<button type="submit" name="submit" class="btn btn-primary">Connexion</button>
		</form>
		<?php
			include("log.php");
			if(isset($_GET['submit']))//on vérifie le clique du bouton
			{
				if(!empty($_GET['Identifiant']) && !empty($_GET['Password']))// on regarde si le formulaire est entièrement remplis
				{
					$Identifiant = $_GET['Identifiant'];
					$Password = $_GET['Password'];
					$basique = $pdo->prepare
					("SELECT *
					FROM login");
					$basique->execute();
					while ($donnees = $basique->fetch())// on fait défilé les données
					{
						if($Identifiant == $donnees['Identifiant'])// on essaye de trouvé un Identifiant égale dans la base de données
						{
							$Password = hash("sha256", $Password);
							if($donnees['Password']== $Password)// on vérifi que le mot de passe est le bon en fonction du login
							{
								session_start();// et on finit par démarer une session
								$_SESSION['Identifiant'] = $Identifiant;
								echo '<div class="alert alert-dismissable alert-success">
								<strong>Yes !</strong> Vous etes bien logué, Redirection dans 2 secondes ! <meta http-equiv="refresh" content="2; URL=principal.php?#">
								</div>';
							}
						}
					}
					echo ("Identifiant ou mot de passe incorrecte");
				}
				else
				{
					echo ("Veuiller remplire tous les champs");
				}
			}
		?>
	</body>
</html>