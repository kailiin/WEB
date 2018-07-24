<?php
include("user.php");
if(isset($_POST['username']) && isset($_POST['password']) && $_POST['register'])
{
    ft_add_user($_POST['username'], $_POST['password']);
    header('Location: index.php');
    exit;
}

else if (isset($_POST['username']) && isset($_POST['password']) && $_POST['login'])
{
    $user = ft_login($_POST['username'], $_POST['password']);
    if (isset($user))
    {
        session_start();
        $_SESSION["id"] = $user["id"];
        $_SESSION["user"] = $user["username"];
        $_SESSION["is_admin"] = $user["is_admin"];
        $_SESSION["logged"] = true;
    }
    header('Location: index.php');
    exit;
}