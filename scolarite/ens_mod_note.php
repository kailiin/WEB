<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />

    <title>Modifier une note</title>

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
// fin de verif          
           
if (!isset($_GET["eid"]) || !isset($_GET["gid"]) || !isset($_GET["nom"]) || !isset($_GET["noet"]) || !isset($_GET["prenom"]) ) {
echo "<p>Erreur<p>\n";
}else {
$eid=$_GET["eid"];
$gid=$_GET["gid"];
$nom=$_GET["nom"];
$prenom=$_GET["prenom"];
$noet=$_GET["noet"];
    
if (!isset($_POST['note']) || !isset($_POST['note'])<0  || !isset($_POST['note'])>20   ) {
include("ens_mod_note_form.php");
}else {
try {
$note = $_POST['note'];
    
  if (!is_numeric($note) || !$note>0 ) {
    include("ens_mod_note_form.php");
    }else{  
      if($note>20){$note=20;}
       if($note<0){$note=0;}
        $SQL = "UPDATE notes SET note=? WHERE gid=? AND eid=? ";
        $st = $db->prepare($SQL);
        $res = $st->execute(array( $note, $gid, $eid));
        if (!$res){
            ?>
             <div class="alert alert-warning">
                 <div align = 'center'>
                     <h2><strong>Erreur de modification!</strong> <br /></h2>
                    <p><a href="ens_correc_note.php" class="btn btn-warning">Revenir à la page de modiffication </a></p>
                </div>
            </div>
             <?php
        }else{
             ?>
             <div class="alert alert-success">
                 <div align = 'center'>
                     <h2><strong>Modification a été effectuée </strong> <br /></h2>
                    <p><a href="ens_correc_note.php" class="btn btn-success">Revenir à la page de modiffication </a></p>
                </div>
            </div>
             <?php
            
        }
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
