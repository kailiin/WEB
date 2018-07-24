

    <form class="col-sm-5 col-sm-offset-3 " method="POST" >
		<legend><strong>Introduisez vos données </strong></legend>
		
				<div class="form-group">
				<label for="inputGroupe">Indiquer votre groupe : </label>
       				<input type="radio" name="type" value="sco" id="sco" /> <label for="Scolarité">Scolarité</label>
       				<input type="radio" name="type" value="ens" id="ens" /> <label for="Enseignant">Enseignant</label>
				</div>
		
                <div class="form-group">
                    <label for="inputNom">Nom</label>
                        <input type="text" name="nom" class="form-control" placeholder="Nom">
                 
                </div>
				
		        <div class="form-group">
                    <label for="inputPrenom">Prenom</label>
                        <input type="text" name="prenom" class="form-control"  placeholder="Prenom">
                </div>			
		         
				<div class="form-group">
                    <label for="inputEmail" >Mail</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
				
				<div class="form-group">
                    <label for="inputLogin" >Login</label>
                        <input type="text" name="login" class="form-control"  placeholder="Login">
                </div>
		
		        <div class="form-group">
                    <label for="inputMDP" >Mot de passe</label>
                        <input type="password" name="password" class="form-control"  placeholder="Mot de passe">
                </div>
		
                <div class="form-group">
                    <label for="inputMDP" >Répéter le mot de passe</label>
                        <input type="password" name="password2" class="form-control"  placeholder="Mot de passe">
                </div>

                <div class="form-group">
                    <div class="col-xs-10 col-xs-offset-2">
                        <button type="submit" class="btn btn-primary">Valider</button>
						 <button type="reset" class="btn btn-primary">Recommencer</button>
                    </div>
                </div>
				<?php
  include("footer.php");
?>
	

            </form>

