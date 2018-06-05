<!DOCTYPE html >
<html>
	<head>
       <meta charset="utf-8" />
	   <link rel="stylesheet" href="cdds.css"/>
	   <title>deconexion</title>
	</head>
	
	<?php
		session_start();
		session_unset();
		session_destroy();
		header('Location: connection.php');
	?>

</html>