<?php

if (isset($badlogin)) {
?>
<div class="alert alert-warning">
    <div align = 'center'>
<strong>Attention!</strong> Il y a un souci de connexion. <br />
    Vérifiez votre login ou mot de passe ...<br />
    </div>
</div>
<?php
}
?>


    <form class="col-sm-5 col-sm-offset-3 form-horizontal" method="POST" >
		<legend><strong>Authentifiez-vous </strong></legend>
		
                <div class="form-group">
                    <label for="inputLogin" class="control-label col-xs-2">Login</label>
                    <div class="col-xs-10">
                        <input type="text" name="login" class="form-control" placeholder="Login">
                    </div>

                </div>
                <div class="form-group">
                    <label for="inputMDP" class="control-label col-xs-2">Password</label>
                    <div class="col-xs-10">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-10 col-xs-offset-2">
                        <button type="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-log-in"></span>  Connexion</button>
						<a href="new_user.php" class="btn btn-primary"> <span class="glyphicon glyphicon-pencil"></span>  S'enregistrer </a>
                    </div>
                </div>
		<div>
		<?php
  include("footer.php");
?>
			 </div>
            </form>


 




