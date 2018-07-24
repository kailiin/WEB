<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />

    <title>Gestion</title>


</head>

<body>
    
<?php
include("includeboostrap.php");	
include("sco_auth.php");
$uid = $auth->userid;  
$droit = false;        
  // verifier le droit d'accéder      
require("db_config.php");
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$SQL = "SELECT * FROM users WHERE userid=$uid AND type='sco' " ;
$res = $db->query($SQL);        
    if ($res->rowCount()==0) $droit=false;
        else{
            $droit=true;
            }
              
        if( $droit){
            include("sco_header.php");
// fin de verif       
?>
 
 
    <div class="container">

        <div class="row">
            
            <div class="col-xs-4">
                <h2>Enregistrement</h2>
                <p>Enregistrement des étudiants, des modules et des groupes à noter.</p>
                <div class="row">
                    <a href="sco_ajout_etudiant.php"  class="btn btn-info">Etudiant</a>
                    <a href="sco_ajout_module.php"  class="btn btn-info">Module</a>
                    <a href="sco_ajout_groupe.php"  class="btn btn-info">Groupe</a>
                </div>
            </div>
            
            <div class="col-xs-4">
                <h2>Affectation</h2>
                <p> Affectation des groupes aux modules ou des étudiants aux groupes.</p>
                 <div class="row">
                    <a href="sco_affec_G_M.php"  class="btn btn-info">Groupes aux modules</a>
                    <a href="sco_affec_E_G.php"  class="btn btn-info">Etudiants aux groupes</a>
                </div>
            </div>
            
           <div class="col-xs-4">
                <h2>Affectation du droit de saisie.</h2>
                <p>Affectation de la saisie aux enseignants.</p>
                <p><a href="sco_affec_droit_saisie.php" class="btn btn-info">Affectation</a></p>
            </div>
            
            <div class="col-xs-8">
                <h2>Modification ou suppression</h2>
                <p>Modification ou suppression des étudiants/modules/groupes.</p>
                 <div class="row">
                    <a href="sco_liste_etudiant.php"  class="btn btn-warning">Etudiant</a>
                    <a href="sco_liste_module.php"  class="btn btn-warning">Module</a>
                    <a href="sco_liste_groupe.php"  class="btn btn-warning">Groupe</a>
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
  