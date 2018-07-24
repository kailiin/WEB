<?php
include("db_connect.php");

function get_all_user()
{
    $link = ft_connectdb();
    $query = "SELECT * FROM `rush00`.`user`";
    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $query))
        die("Erreur de requete");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_row($result))
    {
        $user[] = $row;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    return $user;
}

function ft_get_user_name($name)
{
    $link = ft_connectdb();
    $query = "SELECT * FROM `rush00`.`user` WHERE username = ?";
    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $query))
        die("Erreur de requete");
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    return $user;
}

function ft_get_user($id)
{
    $link = ft_connectdb();
    $query = "SELECT * FROM `rush00`.`user` WHERE id = ?";
    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $query))
        die("Erreur de requete");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    return $user;
}

function ft_add_user($username, $password)
{
    $encoded_pw = hash("whirlpool", $password);
    $link = ft_connectdb();
    $query = "INSERT INTO `rush00`.`user` (`username`, `password`) VALUES (?, ?)";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $encoded_pw);    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    return $result;
}

function ft_del_user($id)
{
    $link = ft_connectdb();
    $query = "DELETE FROM `rush00`.`user` WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    return $result;
}

function ft_updt_user($id, $username, $password, $is_admin)
{
    $link = ft_connectdb();
    $query = "UPDATE `rush00`.`user` 
              SET username = ?, password = ?, is_admin = ? 
              WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ssii", $username, $password, $is_admin, $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    return $result;
}

function ft_login($username, $password)
{
    $encoded_pw = hash("whirlpool", $password);
    $link = ft_connectdb();
    $query = "SELECT * FROM `rush00`.`user` 
              WHERE `username` = ? 
              AND `password` = ?";
    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $query))
        die("Erreur de requete");
    mysqli_stmt_bind_param($stmt, "ss", $username, $encoded_pw);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    return $user;
}
