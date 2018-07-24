<?php

function ft_connectdb()
{
    $link = mysqli_connect("localhost", "root", "rootroot", "rush00");
    if (!$link) 
    {
        $error = mysqli_connect_error();
        $errno = mysqli_connect_errno();
        die("$errno: $error\n");
    }

    return $link;
}
