<?php
require("db_config.php");
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<form action="ens_transmettre.php" method="post">
    <div class="alert alert-info" >
        <div align = 'center'>
            <table>
				<legend>Transmission du droit de saisie</legend>
                <h5>Après la transmission vous perdrez le droit sur le groupe!!!  </h5>
				<label>Groupe</label>
				<select name='groupe' >
					<option value='-1'>Choisir un groupe</option>
                  
					<?php
                    $SQL = "SELECT * FROM groupes gr INNER JOIN affectations aff ON gr.gid=aff.gid WHERE uid=$uid ORDER BY gr.gid";
                    $res = $db->query($SQL);

				    while($row=$res->fetch()) {
                    ?>
                        <option value="<?php echo $row["gid"]; ?>"> <?php echo $row["intitule"]; ?></option>	
                    <?php
						}
					?>
                    
				</select>
            
				<label>Module</label>
				<select name='prof'>
					<option value='-1'>Choisir un enseignant</option>
                    
                    <?php
                    $SQL = "SELECT * FROM users WHERE type='ens' AND userid<>$uid ORDER BY userid";
                    $res = $db->query($SQL);

                    while($row=$res->fetch()) {
                    ?>
                        <option value="<?php echo $row["userid"]; ?>"> <?php echo $row["nom"]; ?></option>		
                    <?php
						}
					?>
				</select>
                    
                </table>
               <input type="submit" value="Transmettre le droit de saisie" class="btn btn-primary btn-default">
            </div>
        </div>
</form>