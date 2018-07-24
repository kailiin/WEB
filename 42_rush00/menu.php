<!DOCTYPE html>
<html>
	<head>
    	<meta charset="UTF-8">
    	<title>Rush00</title>
    	<link rel="stylesheet" href="./style/style.css">
	</head>
	<body>

<ul id="menu">
	<li>
		<a href="index.php">Accueil</a>
	</li>
	<li>
		<a href="tousarticles.php">Tout nos produits</a>
	</li>
	<li>
		<a href="fruits.php">Fruits</a>
	</li>
	<li>
		<a href="legumes.php">Légumes</a>
	</li>
	<?php
		session_start();
		if ($_SESSION["logged"] == false)
		{
	?>
		<li class="menu_r" >
			<a href="panier.php">Panier</a>
		</li>
		<li class="menu_r" >
			<a href="#">Connexion </a>
			<ul>
				<form action="user_form.php" method="POST">
				Identifiant: <input type="text" name="username" value="" />
				<br />
				Mot de passe: <input type="password" name="password" value="" />
				<input type="submit" name="login" value="Connexion"/>
				<a href='inscription.php'>Inscription</a>
				</form>
			</ul>
		</li>	
		<?php
		}
		else
		{
			if ($_SESSION["user"] == "admin")
				header('Location: admin/backoffice.php');
			?>
			<li class="menu_r" >
				<a href="logout.php">D&eacute;connexion</a>
			</li>
			<li class="menu_r" >
				<a href="panier.php">Panier</a>
			</li>
			<li class="menu_r" >
				<a href="mon_compte.php"> <?php echo $_SESSION["user"]; ?></a>
			</li>
		<?php 		
		}
		?>
</ul>
