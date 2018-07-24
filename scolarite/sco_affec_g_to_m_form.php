<?php
$page_title="Affecter un groupe à un module : ";
include("sco_auth.php");
include("sco_header.php");

echo"<b>Liste des modules : </b>";
// connexion à la BD
require("db_config.php");
try {
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$SQL = "SELECT mid,intitule,discipline FROM modules";
$res = $db->query($SQL);
if ($res->rowCount()==0) echo "<P>La liste est vide";
else {echo "<table>\n";
echo "<tr> <td><b>Intitule .</b></td> <td><b>Discipline .</b></td> <td></td></tr>";
while($row=$res->fetch()) {
?>
<tr>
<td><?php echo htmlspecialchars($row['intitule']) ?></td>
<td><?php echo $row['discipline']?></td>
<td><?php echo "<a href='sco_affec_g_to_m.php?mid=$row[mid]'> Affecter </a>" ?></td>
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

