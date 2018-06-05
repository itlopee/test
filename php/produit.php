		<?php //affichage de la table stockage
			$recherche=$_GET["l"];//on récupère la recherche
			include("log.php");
			$basique = $pdo->prepare
			("SELECT *
			FROM stockage
			LEFT JOIN categorie
			ON IdC = Categorie
			LEFT JOIN marque
			ON IdM = Marque
			WHERE Objet LIKE '%$recherche%'
			OR narque LIKE '%$recherche%'
			OR kategorie LIKE '%$recherche%'
			OR Code_barre LIKE '%$recherche%'");
			$basique->execute();
		?>
		<table>
			<tr>
				<form method="post">
					<th>Produit</th>
					<th>Marque</th>
					<th>Catégorie</th>
					<th>Code Barre</th>
					<th>Article restant</th>
					<th>Prix achat</th>
					<th>Prix vente</th>
					<th>Date</th>
					<th>Heure</th>
					<th><a href=" <?php echo ("ajout.php?ajout=stockage") ; ?>" ><button type="submit">Ajouter</button></a></th>
				</form>
			</tr>	
			<?php
				//On affiche les lignes du tableau une à une à l'aide d'une boucle
				// On affiche chaque entrée une à une
				while ($donnees = $basique->fetch())
				{
			?>
			<tr>
				<th><?php echo $donnees['Objet'];?></th>
				<th><?php echo $donnees['narque'];?></th>
				<th><?php echo $donnees['kategorie'];?></th>
				<th><?php echo $donnees['Code_barre'];?></th>
				<th><?php echo $donnees['Quantites'];?><a href=" <?php echo ("quantites.php?var1=".$donnees['IdS']) ; ?>" ><button type="submit">Modifier</button></a></th>
				<th><?php echo $donnees['prix_achat'];?></th>
				<th><?php echo $donnees['prix_vente'];?></th>
				<th><?php echo $donnees['Date'];?></th>
				<th><?php echo $donnees['Heure'];?></th>
				<th><a href=" <?php echo ("stockage.php?var1=".$donnees['IdS']) ; ?>" ><button type="submit">Modifier</button></a></th>
			</tr>
			<?php
				} //fin de la boucle, le tableau contient toute la BDD
			?>
		</table>
		<?php					
			$basique->closeCursor();
		?>