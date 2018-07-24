<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap demo</title>


    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>

<body>
    
        <?php 
include("sco_auth.php");
include("sco_header.php");
?>
 
 
    <div class="container">

        <div class="row">
            
            <div class="col-xs-4">
                <h2>Enregistrement</h2>
                <p>Enregistrement des étudiants, des modules et des groupes à noter.</p>
                <div class="row">
                    <a href="sco_ajout_etudiant.php"  class="btn btn-info">Etudiant</a>
                    <a href="sco_ajout_module.php"  class="btn btn-info">Module</a>
                    <a href="sco_ajout_groupe.php"  class="btn btn-info">Groupe</a>
                </div>
            </div>
            
            <div class="col-xs-4">
                <h2>Affectation</h2>
                <p> Affectation des groupes aux modules ou des étudiants aux groupes.</p>
                 <div class="row">
                    <a href="sco_list_affec_g_to_m.php"  class="btn btn-info">Groupes aux modules</a>
                    <a href="sco_list_affec_e_to_g.php"  class="btn btn-info">Etudiants aux groupes</a>
                </div>
            </div>
            
           <div class="col-xs-4">
                <h2>Affectation du droit de saisie.</h2>
                <p>Affectation de la saisie aux enseignants.</p>
                <p><a href="#" class="btn btn-info">Affectation</a></p>
            </div>
            
            <div class="col-xs-8">
                <h2>Modification ou suppression</h2>
                <p>Modification ou suppression des étudiants/modules/groupes.</p>
                 <div class="row">
                    <a href="sco_liste_etudiant.php"  class="btn btn-warning">Etudiant</a>
                    <a href="sco_liste_module.php"  class="btn btn-warning">Module</a>
                    <a href="sco_liste_groupe.php"  class="btn btn-warning">Groupe</a>
                </div>
            </div>
   

        <hr>

    </div>
<?php
include("footer.php");
?>
    <script src="http://code.jquery.com/jquery-1.12.0.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>