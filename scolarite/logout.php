<?php

session_start();

session_destroy();
include("header.php");
?>
             <div class="alert alert-success">
                 <div align = 'center'>
                     <h2><strong>Vous avez quitté la sesion!</strong> <br /></h2>
                     <p><a href="index.php" class="btn btn-success">Accueille </a></p>
                </div>
            </div>
<?php

include("footer.php");

?>