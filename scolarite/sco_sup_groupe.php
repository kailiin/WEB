<?php
include("sco_auth.php");
include("sco_header.php");
$page_title = "Suppression d'étudiant";

if (!isset($_GET["gid"])) {
echo "<p>Erreur</p>\n";
}else if (!isset($_POST["supprimer"]) && !isset($_POST["annuler"]) ){
include("sco_sup_form.php");
} else if (isset($_POST["annuler"])){
echo "Operation annulée <br>";
}else{
    require("db_config.php");
    $gid = $_GET["gid"];
    try {
    $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
    $SQL = "DELETE FROM groupes WHERE gid=?";
    $st = $db->prepare($SQL);
    $st->execute(array($gid));
    if ($st->rowCount() ==0)
        echo "<p>Erreur de suppression<p>\n";
    else echo "<p>La suppression a été effectuée</p>";
    $db=null;
    }catch (PDOException $e){
    echo "Erreur SQL: ".$e->getMessage();
    }
}
echo "<a href='sco_liste_groupe.php'>Revenir à la page liste détudiants</a>";
//include("footer.php");
?>

