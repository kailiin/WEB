<!DOCTYPE html>

<html>

<head>

    <title>Suppression d'un groupe </title>

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
            
$page_title = "Suppression d'un groupe";

if (!isset($_GET["gid"])) {
echo "<p>Erreur</p>\n";
}else if (!isset($_POST["supprimer"]) && !isset($_POST["annuler"]) ){
include("sco_sup_groupe_from.php");
} else if (isset($_POST["annuler"])){
     ?>
             <div class="alert alert-info">
                 <div align = 'center'>
                     <h2><strong>Operation annulée!</strong> <br /></h2>
                     <p><a href="sco_liste_groupe.php" class="btn btn-info">Retourner vers la liste </a></p>
                     <p><a href="sco_gestion.php" class="btn btn-info">Page de gestion </a></p>
                </div>
            </div>
             <?php
}else{
    $gid = $_GET["gid"];
    try {    
    $SQL = "DELETE FROM groupes WHERE gid=?";
    $st = $db->prepare($SQL);
    $st->execute(array($gid));
    if ($st->rowCount() ==0)
        echo "<p>Erreur de suppression<p>\n";
    else{
        $SQL = "DELETE FROM notes WHERE gid=?";
        $st = $db->prepare($SQL);
        $st->execute(array($gid));
        
        $SQL = "DELETE FROM affectations WHERE gid=?";
        $st = $db->prepare($SQL);
        $st->execute(array($gid));
    }
       ?>
             <div class="alert alert-info">
                 <div align = 'center'>
                     <h2><strong>La suppression a été effectuée!</strong> <br /></h2>
                     <p><a href="sco_liste_groupe.php" class="btn btn-info">Retourner vers la liste </a></p>
                     <p><a href="sco_gestion.php" class="btn btn-info">Page de gestion </a></p>
                </div>
            </div>
             <?php
    $db=null;
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

