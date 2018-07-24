<?php
include_once("db_connect.php");
session_start();
if ($_SESSION['logged'] == true)
{
	$article = serialize($_SESSION['panier']);
	$name = $_SESSION['user'];
	$link = ft_connectdb(); 
	$query = "INSERT INTO `rush00`.`panier` (`username`, `articles`) VALUES (?, ?)";
	$stmt = mysqli_prepare($link, $query);
	mysqli_stmt_bind_param($stmt, "ss", $name, $article);    
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_affected_rows($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($link);
	$_SESSION['panier'] = array();
	header('location: index.php');
}
else
{
	header('location: panier.php?error=true');
}
?>
