<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title>Accueille Enseignant</title>
</head>

<body>
        
 <?php  
include("includeboostrap.php");	
include("ens_auth.php");
$uid = $auth->userid;  
$droit = false;        
  // verifier le droit d'accéder      
require("db_config.php");
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$SQL = "SELECT * FROM users WHERE userid=$uid AND type='ens' " ;
$res = $db->query($SQL);        
    if ($res->rowCount()==0) $droit=false;
        else{
            $droit=true;
            }
              
        if( $droit){
            include("ens_header.php");
  //fin de verif   

echo "<div align = 'center'> ";
?>
   <div class="jumbotron">

       <legend><h1>Pour les enseignants :</h1></legend>
            
<h2>  Affichage : </h2>
   <p>
       Affichage des groupes affectés.<br />
    </p>
    
 <h2>Gestions :</h2>
    <p>
        Saisie des notes pour un groupe.<br />
        Correction des notes.<br /><br />
     </p>  

        </div>
<?php
}else{
                      	  ?>
<div class="alert alert-danger">
    <div align = 'center'>
<strong><h1>Attention!</h1></strong> <br />
		<h2>Vous n'avez pas le droit d'accéder !!!</h2><br />
		<a href="index.php" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-home"></span> Accueille</a>
    </div>
</div>
<?php
        }
include("footer.php");
?>

