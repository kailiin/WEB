<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />

    <title>Gestion</title>

</head>

<body>
    
       <?php
include("ens_auth.php");
	include("includeboostrap.php");	
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
// fin de verif       
?>

 
    <div class="container">

        <div class="row">
            
            <div class="col-xs-6">
                <h2>Saisie des notes</h2>
                <p>Saisie des notes pour un groupe.<br />
                    Les étutiants qui ont déjà leurs notes ne sont pas concernés.
                    </p>
                <div class="row">
                    <a href="ens_Saisie_des_notes.php"  class="btn btn-info">Saisie des notes</a>

                </div>
            </div>
            
            <div class="col-xs-6">
                <h2>Correction des notes</h2>
                <p> Modifier les notes déjà saisies.<br />
                    Les étutiants qui n' ont pas encore leurs notes ne sont pas concernés.
                </p>
                 <div class="row">
                    <a href="ens_correc_note.php"  class="btn btn-info">Correction des notes</a>
                </div>
            </div>
   
        <hr>

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
