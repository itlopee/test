		<?php //affichage de la table categorie
			$recherche=$_GET["l"];//on récuper la recherche
			include("log.php");
			$basique = $pdo->prepare
			("SELECT *
			FROM categorie
			WHERE kategorie LIKE '%$recherche%'");
			$basique->execute();
		?>
		<table>
			<tr>
				<th>Id</th>
				<th>Catégorie</th>
				<th><a href=" <?php echo ("ajout.php?ajout=categorie") ; ?>" ><button type="submit">Ajouter</button></a></th>
			</tr>				
			<?php
				//On affiche les lignes du tableau une à une à l'aide d'une boucle
				// On affiche chaque entrée une à une
				while ($donnees = $basique->fetch())
				{
			?>
			<tr>
				<th><?php echo $donnees['IdC'];?></th>
				<th><?php echo $donnees['kategorie'];?></th>
				<th><a href=" <?php echo ("categorie.php?var1=".$donnees['IdC']) ; ?>" ><button type="submit">Modifier</button></a></th>
			</tr>
			<?php
				} //fin de la boucle, le tableau contient toute la BDD
			?>
		</table>
		<?php					
			$basique->closeCursor();
		?>