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
		$user = ft_get_user_name($_SESSION["user"]);

		if (isset($_POST["oldpw"]) && isset($_POST["newpw"]) && isset($_POST["submit"]) && $_POST["submit"] === "Modifier" &&$_POST["oldpw"] != "" && $_POST["newpw"] != "")
		{
			$pass = hash("whirlpool", $_POST["oldpw"]);
			if ($pass === $user["password"])
			{
				$newpass = hash("whirlpool", $_POST["newpw"]);
				ft_updt_user($user["id"], $_SESSION["user"], $newpass, "0");
				echo "OK\n";
			}
			else
				echo "ERROR passe\n";
		}
		else
			echo "ERROR\n";
	?>
	</body>
</html>