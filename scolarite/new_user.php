<!DOCTYPE html>

<html>

<head>
    <title>Ajout utilisateur</title>
</head>

<body>
	
<?php
include 'db_config.php';
require 'Authentification.class.php';

$db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);

include("header.php");

//Récupération des données
if (!isset($_POST["login"]) || !isset($_POST["password"]) ||
    !isset($_POST["password2"])||!isset($_POST["nom"]) ||!isset($_POST["prenom"]) ||!isset($_POST["email"]) ||!isset($_POST["type"]) ){
//    echo "<p>Erreur dans les données\n";
    include("reg_form.php");
   exit();
}

// Vérification du mdp
if ($_POST["password"] != $_POST["password2"]){
    echo "<p>Mots de passe différents\n";
   include("reg_form.php");
   exit();
}

// Vérification des données
if(empty(trim($_POST['nom'])) || empty(trim($_POST['prenom'])) || empty(trim($_POST['login']))  || empty(trim($_POST['email'])) || empty(trim($_POST['type'])) ){
		  ?>
<div class="alert alert-warning">
    <div align = 'center'>
<strong>Attention!</strong> Erreur dans les données <br />
    </div>
</div>
<?php
   include("reg_form.php");
   exit();    
}

 
  $mdp = md5($_POST["password"]);

  $SQL = "SELECT id FROM users WHERE login=?";
  $st = $db->prepare($SQL);
  $res = $st->execute([$_POST['login']]);

  $row = $st->fetch();

  if($row){
	  ?>
<div class="alert alert-warning">
    <div align = 'center'>
<strong>Attention!</strong> Le login existe déjà <br />
    </div>
</div>
<?php
    include("reg_form.php"); 
    exit(); 
  } 


  $SQL = "INSERT INTO users(nom,prenom,email,login,mdp,type) VALUES (?,?,?,?,?,?)"; 
  $st = $db->prepare($SQL);
  $res = $st->execute([$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['login'],$mdp,$_POST['type'] ] );

  if (!$res) die('Error: '); 
  
  $db=null; 
    ?>
             <div class="alert alert-success">
                 <div align = 'center'>
                     <h2><strong>Utilisateur <?php echo "$_POST[login]"; ?> a été ajouté</strong> <br /></h2>
                     <p><a href="index.php" class="btn btn-success">Accueille </a></p>
                </div>
            </div>
             <?php

 include("footer.php");

?>
