<?php
session_start();

include 'db_config.php';
require 'Authentification.class.php';

$db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);


$redirect = function ($first){
   include("header.php");
    if(!$first) $badlogin = true;
    include("login_form.php");
   
    exit();  
};

$auth = new Authentification($db,$redirect);

if (!$auth->authentificate()){

    exit();
}

?>