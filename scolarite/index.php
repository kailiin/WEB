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
    <style type="text/css">
        body {
            padding-top: 70px;
        }
    </style>

    <div class="container">
        <div class="jumbotron">
            <h1>Site de saisie des notes</h1>
            <p>Ce site permet la saisie électronique des notes des étudiants pour des différents modules.<br />
            Le site présente deux interfaces : une pour les responsables de la scolarité et une pour les enseignants.</p>
        </div>
        
        <div class="row">
            <div class="col-xs-4">
                <h2>Scolarité</h2>
                <p>Saisir ou mettre à jour la liste des étudiants (pour les différentes filières) ou des modules/groupes.<br />
                    Choisir également l’enseignant qui effectuera la saisie des notes.<br />
                </p>
                <p><a href="sco_accueille.php" class="btn btn-success">Entrer  &raquo;</a></p>
            </div>
            
            <div class="col-xs-4">
                <h2>Enseignants</h2>
                <p>Affichage les groupes affectés.<br />
                    Saisie les notes pour un groupe.<br />
                    Correction des notes.<br />
                </p>
                <p><a href="ens_accueille.php" class="btn btn-success">Entrer  &raquo;</a></p>
            </div>
            
            <div class="col-xs-4">
                <h2>Créer un compte</h2>
                <p>Créer un compter pour ce site.</p>
                <p><a href="new_user.php" class="btn btn-success">Entrer  &raquo;</a></p>
            </div>
        </div>
        
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <footer>
                    <p>Projet Web de LIN Kai</p>
                    <p>&copy; Copyright 2016 Programmation WEB</p>
                </footer>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.12.0.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>