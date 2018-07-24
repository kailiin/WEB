<?php
include_once("get_article.php");
session_start();
if ($_POST['submit'] == 'Modifier')
{
	$i = 0;
	while ($_SESSION['panier'][$i])
	{
		if ($_SESSION['panier'][$i][0] === $_GET['eid'])
		{
			if (isset($_POST['nombre']))
			{
				$article = get_article_id($_GET['eid']);
				$price = $article['price'] * $_POST['nombre'];
				$_SESSION['panier'][$i][1] = $_POST['nombre'];
				$_SESSION['panier'][$i][2] = $price; 
				header('location: panier.php');
				exit;
			}

		}
		$i++;
	}
}
header('location: panier.php');
?>