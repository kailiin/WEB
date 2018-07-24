<?php
$page_title="Affecter un groupe à un module";
//include("header.php");
if (!isset($_GET["gid"])) {
echo "<p>Erreur<p>\n";
}else {
    
try {
$gid = $_GET["gid"];
require("db_config.php");
    $db = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    
    $SQL = "SELECT * FROM groupes WHERE gid=?";
    $st = $db->prepare($SQL);
    $st->execute(array($gid));
    if ($st->rowCount() ==0) {
    echo "<p>Erreur dans gid</p>\n";
    } else{
        $row = $st->fetch();
        $mid = $row['mid'];
        $intitule = $row['intitule'];
        if ( !isset($_GET['mid']) ){
   include("sco_affec_g_to_m_form.php");
    } else {
    $mid = $_GET["mid"];
    $intitule= $row['intitule']
    if ($intitule=="" || !is_numeric($mid) ) {
    include("sco_affec_g_to_m_form.php");
    }else{
        
        $SQL = "UPDATE groupes SET mid=?, intitule=? WHERE gid=? ";
        $st = $db->prepare($SQL);
        $res = $st->execute(array($mid, $intitule, $gid));
        if (!$res) // ou if ($st->rowCount() ==0)
        echo "<p>Erreur de modification</p>";
        else echo "<p>La modification a été effectuée</p>";
        
    }
    }
    
        $db=null;
    }
}catch (PDOException $e){
echo "Erreur SQL: ".$e->getMessage();
}
}
echo "<a href='index.php'>Revenir</a> à la page d'accueil";
//include("footer.php");
?>