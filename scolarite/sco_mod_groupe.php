<!DOCTYPE html>

<html>

<head>

    <title>Modifier un groupe </title>

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


if (!isset($_GET["gid"])) {
echo "<p>Erreur<p>\n";
}else {
try {
$gid = $_GET["gid"];
  
    $SQL = "SELECT * FROM groupes WHERE gid=?";
    $st = $db->prepare($SQL);
    $st->execute(array($gid));
    if ($st->rowCount() ==0) {
    echo "<p>Erreur dans gid</p>\n";
    } else{
        $row = $st->fetch();
       // $mid = $row['mid'];
        $intitule = $row['intitule'];
        if (!isset($_POST['intitule']) /*|| !isset($_POST['mid'])*/  ){
    include("sco_mod_groupe_form.php");
            
    } else {
    //$mid= $_POST['mid'];             
    $intitule = $_POST['intitule'];
    if ($intitule==""  /* || !is_numeric($mid) || !$mid>0 */  ) {
    include("sco_mod_groupe_form.php");
    }else{
        
        $SQL = "UPDATE groupes SET  intitule=? WHERE gid=? ";
        $st = $db->prepare($SQL);
        $res = $st->execute(array($intitule, $gid));
        if (!$res) // ou if ($st->rowCount() ==0)
        echo "<p>Erreur de modification</p>";
        else{
            ?>
             <div class="alert alert-success">
                 <div align = 'center'>
                     <h2><strong>La modification a été effectuée!</strong> <br /></h2>
                     <p><a href="sco_liste_groupe.php" class="btn btn-success">Retourner vers la liste </a></p>
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