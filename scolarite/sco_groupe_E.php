<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />

    <title>Grouper les étudiants</title>

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
?>

 
    <div class="container">

            <div class="col-md-8 col-md-offset-2 table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <legend>Grouper les étudiants </legend>
                    <div>
                    <form method="post">
                        <select name='choix' >
                        <option value='0'>Faire un choix</option>
                        <option value='annee'>Grouper par année</option>
                        <option value='filiere'>Grouper par filière</option>
				        </select>
                     <input type="submit" value="Recherche">
                </form>
                    </div>
                    
                    <div>
                  <?php   //affiche le choix 
                    if(isset($_POST['choix']) && ( ($_POST['choix'])=='annee' ||  ($_POST['choix'])=='filiere'  ) ){
                        $choix=$_POST['choix'];
                             echo"<b>Grouper par : </b>";
                             echo "$choix";
                    }
                       ?> 
                    </div>
                    
                    <?php 
                    if(isset($_POST['choix']) && ( ($_POST['choix'])=='annee' ||  ($_POST['choix'])=='filiere'  ) ){
                        $choix=$_POST['choix'];
                        try {     
                        $SQL = "SELECT * FROM etudiants ORDER BY $choix";   
                        $res = $db->query($SQL);
                        if ($res->rowCount()==0) echo "La liste des étudiants est vide.";
                        else{        
                         echo"<thead>";
                        echo" <th>N°d'étudiant</th>";
                        echo" <th>Nom</th>";
                        echo" <th>Prenom </th>";
                        echo"<th>Année </th>";
                        echo"<th>Filiere </th> ";   
                        echo"</thead> ";
                    echo"<tbody>";
                         
                        while($row=$res->fetch()) {
                         ?>
                        <tr>
                            <td><?php echo $row['noet']?></td>
                            <td><?php echo $row['nom']?></td>
                            <td><?php echo $row['prenom']?></td> 
                            <td><?php echo $row['annee']?></td>
                            <td><?php echo $row['filiere']?></td>
                        </tr>    
                     <?php  
                    }
                    
                    echo"</tbody>";
                     $db=null;
                    }
                    }catch (PDOException $e){
                     echo "Erreur SQL: ".$e->getMessage();
                            }
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
