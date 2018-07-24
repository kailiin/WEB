<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title>Grouper les modules par discipline</title>

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
    
?>
 
    <div class="container">

            <div class="col-md-8 col-md-offset-2 table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    
                   <legend>Liste des modules par discipline </legend>
                    <?php 
                        try {
                        $SQL = "SELECT * FROM modules ORDER BY discipline";
                        $res = $db->query($SQL);
                        if ($res->rowCount()==0) echo "La liste des modules est vide";
                        else{
                            
                        echo"<thead>";
                        echo" <th>Mid</th>";
                        echo" <th>Intitule </th>";
                        echo" <th>Discipline</th>";
                        echo"</thead> ";
                    echo"<tbody>";
                         
                        while($row=$res->fetch()) {
                         ?>
                        <tr>
                            <td><?php echo $row['mid']?></td>
                            <td><?php echo $row['intitule']?></td>
                            <td><?php echo $row['discipline']?></td>
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
