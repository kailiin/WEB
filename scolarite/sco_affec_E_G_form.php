<?php   
require("db_config.php");
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<div class="alert alert-info">
    <div align = 'center'>
        
    <div class="container">

            <div class="col-md-7 col-md-offset-2 table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    
                    <form action="sco_affec_E_G.php" method="post">
                    <table>
                    
                        
                        <legend><strong>Affecter un groupe à un module</strong></legend>
                        
                 <label>Groupe</label>
				<select name='groupe' >
					<option value='-1'>Choisir un groupe</option>
                  
					<?php
                    $SQL = "SELECT * FROM groupes ORDER BY gid";
                    $res = $db->query($SQL);

				    while($row=$res->fetch()) {
                    ?>
                        <option value="<?php echo $row["gid"]; ?>"> <?php echo $row["intitule"]; ?></option>	
                    <?php
						}
					?>
                </select>
                        
                    <?php
                    $SQL = "SELECT * FROM etudiants ORDER BY eid";
                    $res = $db->query($SQL);
                        echo"<thead>";
                        echo"<th> </th>";
                        echo"<th>Nom </th>";
                        echo"<th>Prenom </th>";
                        echo"<th>Noet </th>";
                        echo"<th>Annee </th>";
                        echo"<th>Filiere </th>";
                        echo"</thead> ";
                     echo"<tbody>";
                         
                        while($row=$res->fetch()) {
                         ?>
                        <tr>
                            <td><input type="checkbox" name="etudiant[]" value="<?php echo $row['eid']?>"></td>
                            <td><?php echo $row['nom'] ?></td>
                            <td><?php echo $row['prenom']?></td>
                            <td><?php echo $row['noet']?></td>
                            <td><?php echo $row['annee']?></td>
                            <td><?php echo $row['filiere']?></td>
                        </tr>    
                     <?php  
                    }
                    echo"</tbody>";
                        ?>
                        </table>
                     <input type="submit" value="Affecter" class="btn btn-primary btn-info">
                     </form>
                    </table>      
        </div>

    </div>
    </div>
    </div>
  
