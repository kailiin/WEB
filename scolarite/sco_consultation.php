<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title>Consultation</title>
</head>

<body>
    
      <?php
include("sco_auth.php");
include("includeboostrap.php");		
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
                <h2>Affichage classique</h2>
                <p>Affichage de la liste des étudiants, modules, groupes et enseignants.</p>
                <div class="row">
                    <a href="sco_liste_etudiant.php"  class="btn btn-info">Etudiant</a>
                    <a href="sco_liste_module.php"  class="btn btn-info">Module</a>
                    <a href="sco_liste_groupe.php"  class="btn btn-info">Groupe</a>
                </div>
            </div>
            
            <div class="col-xs-4">
                <h2>Affichage des notes</h2>
                <p>Affichage de la liste des notes pour un groupe.<br />
                Affichage de la liste des notes pour un étudiant.</p>
                 
                 <div class="row">
                    <a href="sco_note_pour_un_G.php"  class="btn btn-info">Pour un groupe</a>
                    <a href="sco_note_pour_un_E.php"  class="btn btn-info">Pour un étudiant</a>
                </div>
            </div>
            
            <div class="col-xs-4">
                <h2>Grouper </h2>
                <p>Grouper les étudiants par année et filière, les modules par discipline et les groupes par module.</p>
                 
                <div class="row">
                    <a href="sco_groupe_E.php"  class="btn btn-info">Etudiant</a>
                    <a href="sco_groupe_M.php"  class="btn btn-info">Module</a>
                    <a href="sco_groupe_G.php"  class="btn btn-info">Groupe</a>
                </div>
            </div>
            
            <div class="col-xs-4">
                <h2>Les étudiants sans notes</h2>
                <p>Afficher les étudiants dont les notes n’ont pas encore été saisies.</p>      
                 <div class="row">
                    <a href="sco_etudiant_sans_note.php"  class="btn btn-info">Afficher</a>
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
