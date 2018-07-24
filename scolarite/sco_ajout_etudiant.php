<?php
include("sco_auth.php");
include("sco_header.php");

$page_title="Ajouter une personne";
//include("header.php");

//Récupération des données
if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['noet']) || !isset($_POST['annee']) || !isset($_POST['filiere']) ) {
include("sco_ajout_etudiant_form.php");
} else {
$nom = $_POST['nom'];
$prenom= $_POST['prenom'];
$noet=$_POST['noet'];
$annee= $_POST['annee'];
$filiere=$_POST['filiere'];
    
// Vérification
if ($nom=="" || $prenom=="" || !is_numeric($annee) || !$annee>0 || !is_numeric($noet)  || $filiere=="" ) {
include("sco_ajout_etudiant_form.php");
} else {
    
//Insertion des données
    
// connexion a la BD
require("db_config.php");
try {
$db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$SQL = "INSERT INTO etudiants (nom,prenom,noet,annee,filiere) VALUES ('$nom','$prenom','$noet','$annee','$filiere')";
$st = $db->prepare($SQL);
$res = $st->execute(array($nom, $prenom,$noet,$annee,$filiere));
if (!$res) // ou if ($st->rowCount() ==0)
echo "Erreur d’ajout";
else echo "L'ajout a été effectué<br>";
echo "<a href='sco_ajout_etudiant.php'>Continuer l'ajout.</a><br> ";
echo "<a href='sco_gestion.php'>Revenir</a> à la page de gestion";
$db=null;
}catch (PDOException $e){
echo "Erreur SQL: ".$e->getMessage();
}
}
}
include("footer.php");
?>