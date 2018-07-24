<!DOCTYPE html>

<html>

<head>
   
    <title>Affectation des groupes aux modules  </title>

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
            
if (!isset($_POST['groupe']) || !isset($_POST['module'])  || ($_POST['groupe'])<0 || ($_POST['module'])<0 ) {
include("sco_affec_G_M_form.php");
}else {
try {
$gid = $_POST['groupe'];
$mid = $_POST['module'];
    
        require("db_config.php");
        $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $SQL = "UPDATE groupes SET mid=? WHERE gid=? ";
        $st = $db->prepare($SQL);
        $res = $st->execute(array( $mid, $gid));
        if (!$res) // ou if ($st->rowCount() ==0)
        echo "<p>Erreur d'affectation</p>";
        else{
             ?>
             <div class="alert alert-success">
                 <div align = 'center'>
                     <h2><strong>L'affectation a été effectuée!</strong> <br /></h2>
                     <p><a href="sco_affec_G_M.php" class="btn btn-success">Revenir à la page d'affectation </a></p>
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