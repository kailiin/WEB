<?php
session_start();
session_unset();
$_SESSION["logged"] = false;
$_SESSION['panier'] = array();
header("Location: index.php");