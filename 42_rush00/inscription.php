<!DOCTYPE html>
<html>
	<head>
    	<meta charset="UTF-8">
    	<title>Rush00</title>
    	<link rel="stylesheet" href="./style/style.css">
	</head>
	<body>
		<?php	
			include("menu.php");
		?>
	    <form action="add_user.php" method="POST">
	        Identifiant: <input type="text" name="login" value="" />
	        <br />
	        Mot de passe: <input type="password" name="passwd" value="" />
	        <input type="submit" name="submit" value="Inscription"/>
	        <br />
	        <a href='index.php'>Retour</a>
	    </form>
	</body>
</html>