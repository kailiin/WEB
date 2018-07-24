<?php
require("db_config.php");
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<div class="alert alert-info">
    <div align = 'center'>
    
<form action="sco_affec_droit_saisie.php" method="post">

	
            <table>
                <legend><strong>Affectation du droit de saisie</strong></legend>
                
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
            
				<label>Enseignant</label>
				<select name='prof'>
					<option value='-1'>Choisir un enseignant</option>
                    
                    <?php
                    $SQL = "SELECT * FROM users WHERE type='ens' ORDER BY userid";
                    $res = $db->query($SQL);

                    while($row=$res->fetch()) {
                    ?>
                        <option value="<?php echo $row["userid"]; ?>"> <?php echo $row["nom"]; ?></option>		
                    <?php
						}
					?>
				</select>
                    
                </table>
               <input type="submit" value="Affecter le droit de saisie" class="btn btn-info"">

</form>
    </div>
</div>