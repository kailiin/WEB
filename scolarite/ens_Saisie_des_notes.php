<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
 
    <title>Saisie des notes </title>

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
?>

    <div class="container">

            <div class="col-md-7 col-md-offset-2 table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    
                    <div class="alert alert-info" >
                <div align = 'center'>
                    <legend>Saisie des notes</legend>
                    
                  <div>
                    <form method="post">
                        <select name='groupe' >
                        <option value='-1'>Choisir un groupe</option>
                    
                    <?php
                    // choisir le groupe
                    $SQL = "SELECT * FROM affectations aff INNER JOIN groupes gr ON aff.gid=gr.gid WHERE aff.uid=$uid ";
                    $res = $db->query($SQL);

                    while($row=$res->fetch()) {
                    ?>
                        <option value="<?php echo $row["gid"]; ?>"> <?php echo $row["intitule"]; ?></option>		
                    <?php
						}
					?>
				</select>
                     <input type="submit" value="Contituer" class="btn btn-primary btn-default">
                </form>
                    </div>
                    
                    <div>
                <?php   //affiche le groupe choisit ?> 
                     <?php 
                    if(isset($_POST['groupe'])){
                        $groupe=$_POST['groupe'];
                        try {     
                        $SQL = "SELECT * FROM groupes  WHERE gid=$groupe";   
                        $res2 = $db->query($SQL);
                        if ($res2->rowCount()==0){
                        }else{        
                        while($row=$res2->fetch()) {
                         ?>
                            <?php echo"<b>Les étudiants pour le groupe : </b>";?>
                            <?php echo $row['intitule']?>
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
                    //affiche les notes d'etudiants
                    if(isset($_POST['groupe'])){
                        $groupe=$_POST['groupe'];
                        try {     
                        $SQL = "SELECT * FROM etudiants etu INNER JOIN notes ON etu.eid=notes.eid  WHERE note<0 AND gid=$groupe";
                        $res = $db->query($SQL);
                        if ($res->rowCount()==0) echo "La liste des notes est vide";
                        else{        
                        echo"<thead>";
                        echo" <th>N°d'étutiant</th>";
                        echo" <th>Nom</th>";
                        echo" <th>Prenom </th>";
                        echo"<th>Année </th>";
                        echo"<th>Filiere </th>";
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
                            <td><?php echo "<a href='ens_saisie_note.php?eid=$row[eid]&gid=$groupe&nom=$row[nom]&prenom=$row[prenom]&noet=$row[noet]'> Saisir une note</a>" ?></td>
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
                                </div>
        </div>
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

