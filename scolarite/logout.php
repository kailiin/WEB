<?php

session_start();

session_destroy();
include("header.php");
print("Quitter la sesion...<BR>");
print("<a href=\"index.php\">Page d'accueil</a>");
include("footer.php");

?>