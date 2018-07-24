<?php
session_start();

$i = 0;
while ($_SESSION['panier'][$i])
{
	if ($_SESSION['panier'][$i][0] === $_GET['eid'])
	{
		array_splice($_SESSION['panier'], $i, 1);
		header('location: panier.php');
	}
	$i++;
}
header('location: panier.php');
?>