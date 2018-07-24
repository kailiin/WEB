<?php
include("sco_auth.php");
include("sco_header.php");

$page_title="Ajouter un module";

//Récupération des données
if (!isset($_POST['intitule']) || !isset($_POST['discipline']) ) {
include("sco_ajout_module_form.php");
} else {
$intitule = $_POST['intitule'];
$discipline= $_POST['discipline'];
 
// Vérification
if ($intitule=="" || $discipline=="" ) {
include("sco_ajout_module_form.php");
} else {
    
//Insertion des données
    
// connexion a la BD
require("db_config.php");
try {
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$SQL = "INSERT INTO modules (intitule,discipline) VALUES ('$intitule','$discipline')";
$st = $db->prepare($SQL);
$res = $st->execute(array($intitule, $discipline));
if (!$res) // ou if ($st->rowCount() ==0)
echo "Erreur d’ajout";
else echo "L'ajout a été effectué<br>";
echo "<a href='sco_ajout_module.php'>Continuer l'ajout.</a> <br>";
echo "<a href='sco_gestion.php'>Revenir à la page de gestion.</a> ";
$db=null;
}catch (PDOException $e){
echo "Erreur SQL: ".$e->getMessage();
}
}
}
include("footer.php");
?>