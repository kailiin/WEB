<?php
$page_title="Liste des groupes : ";
include("sco_auth.php");
include("sco_header.php");

echo"<b>Liste des groupes : </b>";
// connexion à la BD
require("db_config.php");
try {
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$SQL = "SELECT gid,mid,intitule FROM groupes";
$res = $db->query($SQL);
if ($res->rowCount()==0) echo "<P>La liste est vide";
else {echo "<table>\n";
echo "<tr> <td><b>Mid .</b></td> <td><b>Intitule .</b></td> <td></td></tr>";
while($row=$res->fetch()) {
?>

<tr>
<td><?php echo $row['mid']?></td>
<td><?php echo $row['intitule']?></td>
<td><?php echo "<a href='sco_mod_groupe.php?gid=$row[gid]'> Modifier . </a>" ?></td>
<td><?php echo "<a href='sco_sup_groupe.php?gid=$row[gid]'> Supprimer  .</a>" ?></td>
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
