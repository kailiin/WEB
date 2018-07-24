<?php
$page_title="Liste d'étutiants : ";
include("sco_auth.php");
include("sco_header.php");

echo"<b>Liste des modules : </b>";
// connexion à la BD
require("db_config.php");
try {
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$SQL = "SELECT eid,nom,prenom,noet,annee,filiere FROM etudiants";
$res = $db->query($SQL);
if ($res->rowCount()==0) echo "La liste est vide";
else {echo "<table>\n";
echo "<tr> <td><b>Nom d'étudiant .</b></td> <td><b> Prenom d'étudiant .</b></td> <td><b>Noet d'étudiant .</b></td> <td><b>Année .</b></td> <td><b>Filiere  .</b></td> <td></td></tr>";
while($row=$res->fetch()) {
?>

<tr>
<td><?php echo htmlspecialchars($row['nom']) ?></td>
<td><?php echo $row['prenom']?></td>
<td><?php echo $row['noet']?></td>
<td><?php echo $row['annee']?></td>
<td><?php echo $row['filiere']?></td>
<td><?php echo "<a href='sco_mod_etudiant.php?eid=$row[eid]'> Modifier . </a>" ?></td>
<td><?php echo "<a href='sco_sup_etudiant.php?eid=$row[eid]'> Supprimer  .</a>" ?></td>
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
