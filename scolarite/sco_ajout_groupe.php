<?php
include("sco_auth.php");
include("sco_header.php");

$page_title="Ajouter un groupe";

//Récupération des données
if (!isset($_POST['intitule']) || !isset($_POST['mid']) ) {
include("sco_ajout_groupe_form.php");
} else {
$intitule = $_POST['intitule'];
$mid= $_POST['mid'];
 
// Vérification
if ($intitule=="" || !is_numeric($mid) ) {
include("sco_ajout_groupe_form.php");
} else {
    
//Insertion des données
    
// connexion a la BD
require("db_config.php");
try {
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$SQL = "INSERT INTO groupes (mid,intitule) VALUES ('$mid','$intitule')";
$st = $db->prepare($SQL);
$res = $st->execute(array($mid, $intitule));
if (!$res) // ou if ($st->rowCount() ==0)
echo "Erreur d’ajout";
else echo "L'ajout a été effectué<br>";
echo "<a href='sco_ajout_groupe.php'>Continuer l'ajout.</a><br>";
echo "<a href='sco_gestion.php'>Revenir à la page de gestion.</a> <br>";
$db=null;
}catch (PDOException $e){
echo "Erreur SQL: ".$e->getMessage();
}
}
}
include("footer.php");
?>