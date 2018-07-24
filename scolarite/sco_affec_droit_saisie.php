<!DOCTYPE html>

<html>

<head>
   
    <title>Affectation du droit de saisie </title>

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
//fin de verif
            
if (!isset($_POST['groupe']) || ($_POST['groupe'])<0 || !isset($_POST['prof']) || ($_POST['prof'])<0 ) {
include("sco_affec_droit_saisie_form.php");
}else {
  
    $gid=$_POST['groupe'];
    $uid=$_POST['prof'];

    //on verifit si c'est deja affecter ou pas
     $SQL = "Select * FROM affectations WHERE uid=$uid AND gid=$gid";
     $res = $db->query($SQL);
     if ($res->rowCount()==0) {
     
                try {
                $SQL = "INSERT INTO affectations (uid,gid) VALUES ('$uid','$gid')";
                    $st = $db->prepare($SQL);
                    $res = $st->execute(array($uid, $gid));
                    if (!$res) // ou if ($st->rowCount() ==0)
                        echo "Erreur d’affectation";
                    
                    $db=null;
                }catch (PDOException $e){
                    echo "Erreur SQL: ".$e->getMessage();
                }
     }
       ?>
             <div class="alert alert-success">
                 <div align = 'center'>
                     <h2><strong>L'ajout a été effectué!</strong> <br /></h2>
                     <p><a href="sco_affec_droit_saisie.php" class="btn btn-success">Revenir à la page d'affectation </a></p>
                     <p><a href="sco_gestion.php" class="btn btn-success">Page de gestion </a></p>
                </div>
            </div>
             <?php
 
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



