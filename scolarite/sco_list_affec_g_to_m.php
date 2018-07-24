<?php
$page_title="Affecter un groupe à un module : ";
include("sco_auth.php");
include("sco_header.php");

echo"<b>Liste des groupes : </b>";
// connexion à la BD
require("db_config.php");
try {
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$SQL = "SELECT gid,intitule FROM groupes";
$res = $db->query($SQL);
if ($res->rowCount()==0) echo "<P>La liste est vide";
    
else {echo "<table>\n";
echo "<tr> <td><b>Intitules des groupes  </b></td>  <td></td></tr>";
while($row=$res->fetch()) {
?>

<tr>
<td><?php echo $row['intitule']?></td>
    
    <td>
            <select name="module">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </td>
    
<td><?php echo "<a href='sco_affec_g_to_m.php?gid=$row[gid] ?nv_mid=$row[module]'> Affecter à un module </a>" ?></td>

</tr>
<?php
}

echo "</table>\n";
    
$db=null;
}
}catch (PDOException $e){
echo "Erreur SQL: ".$e->getMessage();
}

include("footer.php");
?>


