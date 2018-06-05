<!DOCTYPE html >
<html>
	<head>
		<meta charset="utf-8" />
		<title>Page principale</title>
		<link rel="stylesheet" href="cdds.css"/>
	</head>
	<body>
		<?php
			include("log.php");
			$IdS = $_GET['var1'];
			$bdd = $pdo->prepare
				("SELECT *
				FROM stockage
				WHERE IdS LIKE '$IdS'");
				$bdd->execute();
			if ($donnees = $bdd->fetch())
				{
					$Objet = $donnees['Objet'];
					$Code_barre = $donnees['Code_barre'];
					$Quantites = $donnees['Quantites'];
					$prix_achat = $donnees['prix_achat'];
					$prix_vente = $donnees['prix_vente'];
				}
			if(isset($_GET['Valid']))//si le bonton valider a été cliqué
			{
				$Marque = $_GET['Marque'];
				$Categorie = $_GET['Categorie'];
				$basique2 = $pdo->prepare
					("SELECT *
					FROM marque
					WHERE narque LIKE'$Marque'");
				$basique2->execute();
				if($Mark = $basique2->fetch())
					$Marque = $Mark['IdM'];
				$basique = $pdo->prepare
					("SELECT *
					FROM categorie
					WHERE kategorie LIKE'$Categorie'");
				$basique->execute();
				if($Cate = $basique->fetch())
					$Categorie = $Cate['IdC'];
				if(!empty($_GET['Produit']))
					$Objet = $_GET['Produit'];
				if(!empty($_GET['Code_barre']))
					$Code_barre = $_GET['Code_barre'];
				if(!empty($_GET['Quantites']))
					$Quantites = $_GET['Quantites'];
				if(!empty($_GET['prix_achat']))
					$prix_achat = $_GET['prix_achat'];
				if(!empty($_GET['prix_vente']))
					$prix_vente = $_GET['prix_vente'];
				$Date = date("Y-m-d");
				$Heure = date("H:i:s");
				$base = $pdo->prepare
				("UPDATE stockage
				SET Objet = '$Objet', Marque = '$Marque', Categorie = '$Categorie', Code_barre = '$Code_barre', Quantites = '$Quantites', prix_achat = '$prix_achat', prix_vente = '$prix_vente', Date = '$Date', Heure = '$Heure' 
				WHERE IdS = '$IdS'");
				$base->execute();//modification
				echo '<div class="alert alert-dismissable alert-success"><meta http-equiv="refresh" content="0; URL=principal.php?#"></div>';
			}
			else
			{
				$basique = $pdo->prepare
					("SELECT *
					FROM categorie");
				$basique->execute();
				$basique2 = $pdo->prepare
					("SELECT *
					FROM marque");
				$basique2->execute();
			}
			if (isset($_POST['Supprimer']))//suppression
				{
						$Supprimer = $pdo->prepare( "DELETE FROM stockage WHERE IdS = '$IdS'");
						$Supprimer->execute();
						echo '<div class="alert alert-dismissable alert-success"><meta http-equiv="refresh" content="0; URL=principal.php?#"></div>';
				}
		?>
		<form>
			<input type="text" class="form-control" name="Produit" placeholder="<?php echo $Objet?>"/>
			<SELECT name="Marque" size="1">
			 <?php
				while($Mark = $basique2->fetch())
				{?>
					<OPTION><?php echo $Mark['narque'];
				}
			?>
			</SELECT>
			<SELECT name="Categorie" size="1">
			 <?php
				while($Cate = $basique->fetch())
				{?>
					<OPTION><?php echo $Cate['kategorie'];
				}
			?>
			</SELECT>
			<input type="text" class="form-control" name="Code_barre" placeholder="<?php echo $Code_barre?>"/>
			<input type="text" class="form-control" name="Quantites" placeholder="<?php echo $Quantites?>"/>
			<input type="text" class="form-control" name="prix_achat" placeholder="<?php echo $prix_achat?>"/>
			<input type="text" class="form-control" name="prix_vente" placeholder="<?php echo $prix_vente?>"/>
			<input type="submit" class="form-control" name="Valid" placeholder="Valider"/>
			<input type="hidden" name="var1" value="<?php echo "".$IdS."" ?>"></input>
			<input type="submit" name='Supprimer' value="Supprimer">
		</form>
		<?php
			
		?>
	</body>
</html>