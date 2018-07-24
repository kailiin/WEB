<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/style.css">
		<title>Rush00</title>
	</head>
	<body>
		<ul id="menu">
			<li>
				<a href="backoffice.php">Produits</a>
			</li>
			<li>
				<a href="adm_users.php">Users</a>
			</li>
			<?php
				session_start();
				if ($_SESSION["logged"] == false && $_SESSION["is_admin"] != 1)
				{
		    		header('Location: ../index.php');
				}
				else
				{
					?>
					<li class="menu_r" >
						<a href="../logout.php">D&eacute;connexion</a>
					</li>
					<li class="menu_r" >
						<a href="#"> <?php echo $_SESSION["user"]; ?></a>
					</li>
				<?php 
				if ($_SESSION["is_admin"] == 1)
				{
				?>
					<li class="menu_r" >
						<a href="backoffice.php"> Backoffice</a>
					</li>
				<?php
				}		
				}
				?>
		</ul>
	</body>
</html>