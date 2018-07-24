<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />

    <title>Transmettre le droit de saisie </title>


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
//fin de verif
            
if (!isset($_POST['groupe']) || ($_POST['groupe'])<0 || !isset($_POST['prof']) || ($_POST['prof'])<0 ) {
include("ens_transmettre_form.php");
}else {
  
    $gid=$_POST['groupe'];
    $nv_uid=$_POST['prof'];

    //on verifit s'il a deja le droit de saisie ou pas
     $SQL = "Select * FROM affectations aff INNER JOIN users ON aff.uid=users.userid WHERE aff.uid=$nv_uid AND aff.gid=$gid";
     $res = $db->query($SQL);
     if ($res->rowCount()==0) {
         
                 try {
                $SQL = "UPDATE affectations SET uid=? WHERE uid=? AND gid=?";
                    $st = $db->prepare($SQL);
                    $res = $st->execute(array($nv_uid,$uid,$gid));
                    if (!$res) // ou if ($st->rowCount() ==0)
                        echo "Erreur de transmission";  
                }catch (PDOException $e){
                    echo "Erreur SQL: ".$e->getMessage();
                }
         ?>
             <div class="alert alert-success">
                 <div align = 'center'>
                     <h2><strong>La transmission a été effectuée!</strong> <br /></h2>
                     <p><a href="ens_accueille.php" class="btn btn-success">Accueille </a></p>
                </div>
            </div>
             <?php
       
         
     }else{
        ?>
             <div class="alert alert-warning">
               <a href="ens_transmettre.php" class="close" data-dismiss="alert">&times;</a>
                 <div align = 'center'>
                     <h2><strong>Attention!</strong> <br /></h2>
                     <?php
                    echo "<h3> L'enseignant que vous avez choisie possèdre déjà le droit de sausie de ce groupe. </h3> ";
                    ?>
                     <p><a href="ens_accueille.php" class="btn btn-warning">Accueille </a></p>
                </div>
            </div>
             <?php
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
