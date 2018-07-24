<?php
require("db_config.php");
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<div class="alert alert-info">
    <div align = 'center'>
        
<form action="sco_affec_G_M.php" method="post">

	
            <table>
                <legend><strong>Affecter un groupe à un module</strong></legend>
                
				<label>Groupe: </label>
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
            <div></div>
				<label>Module:  </label>
				<select name='module'>
					<option value='-1'>Choisir un module</option>
                    
                    <?php
                    $SQL = "SELECT * FROM modules ORDER BY mid";
                    $res = $db->query($SQL);

                    while($row=$res->fetch()) {
                    ?>
                        <option value="<?php echo $row["mid"]; ?>"> <?php echo $row["intitule"]; ?></option>		
                    <?php
						}
					?>
				</select>
                    
                </table>
               <input type="submit" value="Affecter" class="btn btn-info">

</form>
    </div>
</div>
