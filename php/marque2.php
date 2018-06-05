		<?php //affichage de la table marque
			$recherche=$_GET["l"];
			include("log.php");
			$basique = $pdo->prepare
			("SELECT *
			FROM marque
			WHERE narque LIKE '%$recherche%'");
			$basique->execute();
		?>
		<table>
			<tr>
				<th>Id</th>
				<th>Marque</th>
				<th><a href=" <?php echo ("ajout.php?ajout=marque") ; ?>" ><button type="submit">Ajouter</button></a></th>
			</tr>				
			<?php
				//On affiche les lignes du tableau une à une à l'aide d'une boucle
				// On affiche chaque entrée une à une
				while ($donnees = $basique->fetch())
				{
			?>
			<tr>
				<th><?php echo $donnees['IdM'];?></th>
				<th><?php echo $donnees['narque'];?></th>
				<th><a href=" <?php echo ("marque.php?var1=".$donnees['IdM']) ; ?>" ><button type="submit">Modifier</button></a></th>
			</tr>
			<?php
				} //fin de la boucle, le tableau contient toute la BDD
			?>
		</table>
		<?php					
			$basique->closeCursor();
		?>