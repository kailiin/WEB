<!DOCTYPE html>
<html>
	<head>
    	<meta charset="UTF-8">
    	<title>Rush00</title>
    	<link rel="stylesheet" href="./style/style.css">
	</head>
	<body>
<?php
include_once("menu.php");
include_once("db_connect.php");
$link = ft_connectdb();
$query = "SELECT article.id, article.name, article.quantity, article.image, article.price FROM `article` JOIN `articles_has_category` AS ac ON article.id = ac.article_id WHERE ac.category_id = 2";
$stmt = mysqli_stmt_init($link);
if (!mysqli_stmt_prepare($stmt, $query))
    die("Erreur de requete");
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_row($result))
{
   	$article[] = $row;
}
mysqli_stmt_close($stmt);
mysqli_close($link);
$i = 0;
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
