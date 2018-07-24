<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />

    <title>Liste des notes pour un étudiant</title>

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

            <div class="col-md-7 col-md-offset-2 table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    
                    <legend>Liste des notes pour un étudiant </legend>
                    
                    <div>
                    <form method="post">
                        <select name='etudiant' >
                        <option value='-1'>Choisir un étudiant</option>
                    
                    <?php
                    $SQL = "SELECT * FROM etudiants ORDER BY eid";
                    $res = $db->query($SQL);

                    while($row=$res->fetch()) {
                    ?>
                        <option value="<?php echo $row["eid"]; ?>"> <?php echo "N° ".$row["noet"]." ".$row["nom"]." ".$row["prenom"]; ?></option>		
                    <?php
						}
					?>
				</select>
                     <input type="submit" value="Recherche">
                </form>
                    </div>
                    
                    <div>
                  <?php   //affiche l'etudiant choisit ?> 
                     <?php 
                    if(isset($_POST['etudiant'])){
                        $etudiant=$_POST['etudiant'];
                        try {     
                        $SQL = "SELECT * FROM etudiants  WHERE eid=$etudiant";   
                        $res2 = $db->query($SQL);
                        if ($res2->rowCount()==0){
                        }else{        
                        while($row=$res2->fetch()) {
                         ?>             
                            <?php echo"<b>Liste des notes pour l'étudiant : </b>";?>
                            <?php echo $row['nom']?>
                            <?php echo $row['prenom']?>
                            <?php echo " n°d'étudiant :".$row['noet']?>
                       <?php  
                    }
                    }
                    }catch (PDOException $e){
                     echo "Erreur SQL: ".$e->getMessage();
                            }
                    }
                       ?> 
                    </div>
                    
                    <?php 
                    if(isset($_POST['etudiant'])){
                        $etudiant=$_POST['etudiant'];
                        try {     
                        $SQL = "SELECT * FROM groupes gr INNER JOIN notes ON gr.gid=notes.gid  WHERE note>=0 AND notes.eid=$etudiant";   
                        $res = $db->query($SQL);
                        if ($res->rowCount()==0) echo "<h3>Etudiant sans note!!</h3>";
                        else{        
                        echo"<thead>";
                        echo"<th>Groupe </th>";
                        echo"<th>Note </th>";
                        echo"</thead> ";
                    echo"<tbody>";
                         
                        while($row=$res->fetch()) {
                         ?>
                        <tr>
                            <td><?php echo $row['intitule']?></td>
                            <td><?php echo $row['note']?></td>
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
