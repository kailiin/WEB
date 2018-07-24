<!DOCTYPE html>

<html>

<head>
   
    <title>Ajouter un module </title>

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

//Récupération des données
if (!isset($_POST['intitule']) || !isset($_POST['discipline']) ) {
include("sco_ajout_module_form.php");
} else {
$intitule = $_POST['intitule'];
$discipline= $_POST['discipline'];
 
// Vérification
if ($intitule=="" || $discipline=="" ) {
include("sco_ajout_module_form.php");
} else {
    
//Insertion des données

try {
$SQL = "INSERT INTO modules (intitule,discipline) VALUES ('$intitule','$discipline')";
$st = $db->prepare($SQL);
$res = $st->execute(array($intitule, $discipline));
if (!$res) // ou if ($st->rowCount() ==0)
echo "Erreur d’ajout";
else{
     ?>
             <div class="alert alert-success">
                 <div align = 'center'>
                     <h2><strong>L'ajout a été effectué!</strong> <br /></h2>
                     <p><a href="sco_ajout_module.php" class="btn btn-success">Continuer l'ajout </a></p>
                     <p><a href="sco_gestion.php" class="btn btn-success">Page de gestion </a></p>
                </div>
            </div>
             <?php
}
$db=null;
}catch (PDOException $e){
echo "Erreur SQL: ".$e->getMessage();
}
}
}
    
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