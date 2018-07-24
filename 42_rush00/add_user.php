<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="./style/style.css">
		<title>Rush00</title>
	</head>
	<body>
	<?php
		include ("menu.php");
		include ("user.php");
		if (isset($_POST["login"]) && isset($_POST["passwd"]) && isset($_POST["submit"]) && $_POST["submit"] === "Inscription" && $_POST["login"] != "" && $_POST["passwd"] != "")
		{
			$user = ft_get_user_name($_POST["login"]);
			if (!isset($user))
			{
				$exist = 0;
			}
			else
				$exist = 1;
			if ($exist === 0)
			{		
				ft_add_user($_POST["login"], $_POST["passwd"]);
				echo "OK\n";
			}
			else
				echo "ERROR exite deja\n";
		}
		else
			echo "ERROR\n";
	?>
	</body>
</html>