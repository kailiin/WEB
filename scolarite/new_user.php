<?php
include 'db_config.php';
require 'Authentification.class.php';

$db = new PDO("mysql:hostname=$hostname;dbname=$dbname",$username,$password);

$page_title = "Ajout utilisateur";
include("header.php");

//Récupération des données
if (!isset($_POST["login"]) || !isset($_POST["password"]) ||
    !isset($_POST["password2"])||!isset($_POST["nom"]) ||!isset($_POST["prenom"]) ||!isset($_POST["email"]) ||!isset($_POST["type"]) ){
//    echo "<p>Erreur dans les données\n";
    include("reg_form.php");
    include("footer.php");
   exit();
}

// Vérification du mdp
if ($_POST["password"] != $_POST["password2"]){
    echo "<p>Mots de passe différents\n";
   include("reg_form.php");
   include("footer.php");
   exit();
}

// Vérification des données
if(empty(trim($_POST['nom'])) || empty(trim($_POST['prenom'])) || empty(trim($_POST['login']))  || empty(trim($_POST['email'])) || empty(trim($_POST['type'])) ){
    echo "<p>Erreur dans les données\n";
   include("reg_form.php");
   include("footer.php");
   exit();    
}

 
  $mdp = md5($_POST["password"]);

  $SQL = "SELECT id FROM users WHERE login=?";
  $st = $db->prepare($SQL);
  $res = $st->execute([$_POST['login']]);

  $row = $st->fetch();

  if($row){
    echo "<p>Le login existe déjà\n";
    include("reg_form.php"); 
    include("footer.php");
    exit(); 
  } 


  $SQL = "INSERT INTO users(nom,prenom,email,login,mdp,type) VALUES (?,?,?,?,?,?)"; 
  $st = $db->prepare($SQL);
  $res = $st->execute([$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['login'],$mdp,$_POST['type'] ] );

  if (!$res) die('Error: '); 
  
  $db=null; 

  echo "<p>Utilisateur $_POST[login] ajouté.\n";
  echo "<p><a href='index.php'>Revenir à la page d'accueil</a>\n";
  include("footer.php");

?>