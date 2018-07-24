<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="./style/style.css">
		<title>Rush0</title>
	</head>
	<body>
		<?php
			session_start();
			include("menu.php");
		?>
		 <div class="all_p">
		 	<?php
		 		include ("get_article.php");
		 		$i = 0;
				$article = get_all_article();
				while ($article[$i])
				{
					$id = $article[$i][0];
			?>
				<div class="p_box">
					<div>
		 				<img class="img_big" src=<?php echo $article[$i][3]; ?> ALT=<?php echo $article[$i][1]; ?>>
		 			</div>
				    <form action="add.php?eid=<?php echo $id ?>" method="POST">
				        Nombre: <input type="number" name="nombre" value="" />
				        <input type="submit" name="submit" value="Acheter"/>
				    </form>
		 		</div>
		 	<?php
		 			$i++;
				}
			?>
		 </div>
	</body>
</html>