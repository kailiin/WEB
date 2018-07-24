<?php
include("sco_auth.php");
include("sco_header.php");
$page_title="Liste des enseignants";

echo"<b>Liste des enseignants </b>";
// connexion à la BD
require("db_config.php");
try {
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$SQL = "SELECT userid,nom,prenom,email FROM users WHERE type='ens'";
$res = $db->query($SQL);
if ($res->rowCount()==0) echo "<P>La liste est vide";
else {echo "<table>\n";
echo "<tr> <td><b>Nom de l'enseignant .</b></td> <td><b>Prenom de l'enseignant .</b></td> <td><b>Email</b></td> <td></td></tr>";
while($row=$res->fetch()) {

echo "<tr><td>$row[nom]</td><td>$row[prenom]</td><td>$row[email]</td></tr>";
}
echo "</table>";
       
$db=null;
}
}catch (PDOException $e){
echo "Erreur SQL: ".$e->getMessage();
}
echo "<br><a href='sco_accueille.php'>Revenir</a> à la page d'accueil";
//include("footer.php");
?>

