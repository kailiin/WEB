<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="./style/style.css">
		<title>Rush00</title>
	</head>
	<body>
	<?php
		include("menu.php");
		include ("user.php");
		if ($_SESSION["logged"] == false)
			header('Location: index.php');
		else
		{
			ft_del_user($_SESSION["id"]);
			header ("location: logout.php");
			session_unset();
			$_SESSION["logged"] = false;
		}
	?>
	</body>
</html>
