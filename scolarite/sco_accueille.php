
<!DOCTYPE html>

<html>

	<head>
        <meta charset="utf-8"/>	
        <title> Accueille Scolarité </title>
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
            
echo "<div align = 'center'> ";
?>
    <div class="jumbotron">
   <div class="container">
    <section>
        <article>
  <h1>Pour les responsables de scolarité :</h1><br /><br />
            
<h2> Consultations : </h2>
   <p>
Affichage de la liste des étudiants, modules, groupes et enseignants.<br />
Affichage de la liste des notes pour un groupe.<br />
Affichage de la liste des notes pour un étudiant.<br />
Afficher les étudiants dont les notes n’ont pas encore été saisies.<br />
    </p>
    
 <h2>Gestions :</h2>
    <p>
Enregistrement des étudiants, des modules et des groupes à noter.<br />
Affectation des groupes aux modules.<br />
Affectation des étudiants aux groupes.<br />
Modification ou suppression des étudiants/modules/groupes.<br />
Affectation de la saisie aux enseignants.<br /><br />
     </p>  
            

        </article>
    </section>
        </div>
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

       
	</body>

	
</html>