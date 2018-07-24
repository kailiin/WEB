<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
 
    <title>Liste des groupes affectés</title>

</head>

<body>
    
<?php  
	include("includeboostrap.php");	
include("ens_auth.php");
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
            
?>
 
    <div class="container">
            <div class="col-md-5 col-md-offset-3 table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <legend>Liste des groupes affectés</legend>
                    <?php 
                        try {
                        $SQL = "SELECT * FROM affectations aff INNER JOIN groupes gr ON aff.gid=gr.gid WHERE aff.uid=$uid ";
                        $res = $db->query($SQL);
                        if ($res->rowCount()==0) echo "La liste des groupes affectés est vide";
                        else{
                            
                        echo"<thead>";
                        echo" <th>ID du groupe</th>";
                        echo" <th>Intitule des groupes</th>"; 
                        echo"</thead> ";
                    echo"<tbody>";
                         
                        while($row=$res->fetch()) {
                         ?>
                        <tr>
                            <td><?php echo $row['gid']?></td>
                            <td><?php echo $row['intitule']?></td>
                        </tr>    
                     <?php  
                    }
                    
                    echo"</tbody>";
                     $db=null;
                    }
                    }catch (PDOException $e){
                     echo "Erreur SQL: ".$e->getMessage();
                            }
                       ?> 
                </table>
         
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
