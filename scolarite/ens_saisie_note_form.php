<?php
require("db_config.php");
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<div class="alert alert-info" >
        <div align = 'center'>
            
<legend>Ajouter une note</legend>
<h4>Ajouter une note pour l'étudiant <?php echo"$nom"." ".$prenom." "." N°d'étudiant : ".$noet ?> </h4>
<h5>Les notes sont sur 20. </h5>
<form action="" method="post">
<table>
    <tr><td>Nouveau note: </td><td><input type="number" name="note"  step="0.01" min="0" max="20"  /></td></tr>
</table>
<input type="submit" name="modifier" value="Modifier" class="btn btn-primary btn-default">
</form>
            
     </div>
 </div>