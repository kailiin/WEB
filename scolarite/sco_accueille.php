
<!DOCTYPE html>

<html>

	<head>
        <meta charset="utf-8"/>	
        <title> Accueille Scolarité </title>
	</head>

    
	<body>
        
        <?php
    
include("sco_auth.php");

include("sco_header.php");

echo "<div align = 'center'> ";
?>
    <section>
        <article>
  <h1>Pour les responsables de scolarité :</h1><br /><br />
            
<h2> Consultations : </h2>
   <p>
Affichage de la liste des étudiants, modules, groupes et enseignants.<br />
Affichage de la liste des notes pour un groupe.<br />
Affichage de la liste des notes pour un étudiant.<br />
    </p>
    
 <h2>Gestions :</h2>
    <p>
Enregistrement des étudiants, des modules et des groupes à noter.<br />
Affectation des groupes aux modules.<br />
Affectation des étudiants aux groupes.<br />
Modification ou suppression des étudiants/modules/groupes.<br />
Affectation de la saisie aux enseignants.<br /><br />
     </p>  
            

        </article>
    </section>
<?php

include("footer.php");
?>


	</body>

	
</html>