		<!--menu côté gauche-->
		<ul class="menu-deroulant">
			<li>
				<a href="logout.php">Deconnection</a>
			</li>
			<li>
				<a href="#" class="base">Base de Données</a>
			</li>
			<?php
			$Identifiant = $_SESSION['Identifiant'];
			$basique = $pdo->prepare
			("SELECT *
			FROM login
			WHERE Identifiant LIKE '$Identifiant'");
			$basique->execute();
			if($donnees = $basique->fetch())
			{
				if($donnees['Droit_acces']=="2")
				{
			?>
			<li>
				<a href="#" class="produit">Modification Produit</a>
			</li>
			<li>
				<a href="#" class="acces">Modification droit d'accès</a>
			</li>
			<li>
				<a href="#" class="categorie">Modification Catégorie</a>
			</li>
			<li>
				<a href="#" class="marque">Modification marque</a>
			</li>
			<?php
				}
			}
			?>
		</ul>
		