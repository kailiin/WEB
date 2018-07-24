<!DOCTYPE html>

<html>

<head>

    <title>Modifier un étudiant </title>

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


if (!isset($_GET["eid"])) {
echo "<p>Erreur<p>\n";
}else {
try {
$eid = $_GET["eid"];
  
    $SQL = "SELECT * FROM etudiants WHERE eid=?";
    $st = $db->prepare($SQL);
    $st->execute(array($eid));
    if ($st->rowCount() ==0) {
    echo "<p>Erreur dans eid</p>\n";
    } else{
        $row = $st->fetch();
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $noet = $row['noet'];
        $annee = $row['annee'];
        $filiere = $row['filiere'];
        if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['noet'])|| !isset($_POST['annee']) || !isset($_POST['filiere'])  ){
    include("sco_mod_etudiant_form.php");
            
    } else {
    $nom = $_POST['nom'];
    $prenom= $_POST['prenom'];
    $noet= $_POST['noet'];
    $annee= $_POST['annee'];
    $filiere= $_POST['filiere'];        
    if ($nom=="" || $prenom=="" || $filiere==""|| !is_numeric($noet) || !is_numeric($annee)  ) {
    include("sco_mod_etudiant_form.php");
    }else{
        
        $SQL = "UPDATE etudiants SET nom=?, prenom=?, noet=? , annee=? ,filiere=? WHERE eid=? ";
        $st = $db->prepare($SQL);
        $res = $st->execute(array($nom, $prenom, $noet, $annee, $filiere, $eid));
        if (!$res) // ou if ($st->rowCount() ==0)
        echo "<p>Erreur de modification</p>";
        else{
            ?>
             <div class="alert alert-success">
                 <div align = 'center'>
                     <h2><strong>La modification a été effectuée!</strong> <br /></h2>
                     <p><a href="sco_liste_etudiant.php" class="btn btn-success">Retourner vers la liste </a></p>
                     <p><a href="sco_gestion.php" class="btn btn-success">Page de gestion </a></p>
                </div>
            </div>
             <?php
        }
        
    }
    }
    }
}catch (PDOException $e){
echo "Erreur SQL: ".$e->getMessage();
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