<?php
include_once("db_connect.php");

function get_all_article()
{
	$link = ft_connectdb();
	$query = "SELECT * FROM `rush00`.`article`";
	$stmt = mysqli_stmt_init($link);
	if (!mysqli_stmt_prepare($stmt, $query))
        die("Erreur de requete");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_row($result))
    {
    	$articles[] = $row;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    return $articles;
}

function get_article_id($id)
{
	$link = ft_connectdb();
    $query = "SELECT * FROM `rush00`.`article` WHERE id = ?";
    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $query))
        die("Erreur de requete");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $article = mysqli_fetch_array($result, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    return $article;
}

function add_article($name, $quantity, $price)
{
    $link = ft_connectdb();
    $query = "INSERT INTO `rush00`.`article` (`name`, `quantity`, `price`) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sii", $name, $quantity, $price);    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    return $result;
}

function ft_del_article($id)
{
    $link = ft_connectdb();
    $query = "DELETE FROM `rush00`.`article` WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    return $result;
}

function add_category($name)
{
    $link = ft_connectdb();
    $query = "INSERT INTO `rush00`.`category` (`name`) VALUES (?)";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $name);    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    return $result;
}
?>