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
			include ("user.php");
			if ($_SESSION["logged"] == false)
				header('Location: index.php');
		
			$user = ft_get_user_name($_SESSION["user"]);
		?>
	    <form action="modif_compte.php" method="POST">
	        Identifiant: <?php echo $user["username"]; ?>
	        <br />
	        Ancien mot de passe: <input type="password" name="oldpw" value="" />
	        <br />
	        Nouveau mot de passe: <input type="password" name="newpw" value="" />
	        <input type="submit" name="submit" value="Modifier"/>
	        <a href="del_compte.php"> Supprimer le compte</a>
	    </form>
	</body>
</html>