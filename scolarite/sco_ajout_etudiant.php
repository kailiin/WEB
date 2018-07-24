<!DOCTYPE html>

<html>

<head>

    <title>Ajouter un étudiant </title>

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
if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['noet']) || !isset($_POST['annee']) || !isset($_POST['filiere']) ) {
include("sco_ajout_etudiant_form.php");
} else {
$nom = $_POST['nom'];
$prenom= $_POST['prenom'];
$noet=$_POST['noet'];
$annee= $_POST['annee'];
$filiere=$_POST['filiere'];
    
// Vérification
if ($nom=="" || $prenom=="" || !is_numeric($annee) || !$annee>0 || !is_numeric($noet)  || $filiere=="" ) {
include("sco_ajout_etudiant_form.php");
} else {
    
//Insertion des données
    

try {
$SQL = "INSERT INTO etudiants (nom,prenom,noet,annee,filiere) VALUES ('$nom','$prenom','$noet','$annee','$filiere')";
$st = $db->prepare($SQL);
$res = $st->execute(array($nom, $prenom,$noet,$annee,$filiere));
if (!$res) // ou if ($st->rowCount() ==0)
echo "Erreur d’ajout";
else{
             ?>
             <div class="alert alert-success">
                 <div align = 'center'>
                     <h2><strong>L'ajout a été effectué!</strong> <br /></h2>
                     <p><a href="sco_ajout_etudiant.php" class="btn btn-success">Continuer l'ajout </a></p>
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