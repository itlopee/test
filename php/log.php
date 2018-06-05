			<?php
			try
			{
				// On se connecte à MySQL
				$pdo = new PDO('mysql:host=localhost;dbname=stock;charset=utf8', 'root', '1234');
			}
			catch(Exception $e)
			{
				// En cas d'erreur, on affiche un message et on arrête tout
				die('Erreur : '.$e->getMessage());
			}?>