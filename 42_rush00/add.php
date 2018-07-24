<?php
session_start();
include ("get_article.php");
if ($_POST['submit'] === 'Acheter')
{
	if (isset($_POST['nombre']))
	{
		$article = get_article_id($_GET['eid']);
		$price = $article['price'] * $_POST['nombre'];
		$panier = array(
			$_GET['eid'],
			$_POST['nombre'],
			$price,
		);
		$i = 0;
		while ($_SESSION['panier'][$i])
		{
			if ($_SESSION['panier'][$i][0] === $_GET['eid'])
			{
				$_SESSION['panier'][$i][1] = $_SESSION['panier'][$i][1] + $_POST['nombre'];
				$_SESSION['panier'][$i][2] = $_SESSION['panier'][$i][2] + $price;
				header('location:'. $_SERVER['HTTP_REFERER']);
				exit;
			}
			$i++;
		}
		array_push($_SESSION['panier'], $panier);
	}
}
header('location:'. $_SERVER['HTTP_REFERER']);
?>