

 <form class="col-sm-5 col-sm-offset-3 " method="POST" >
                <legend><strong>Modifier un étudiant </strong></legend>
		

                <div class="form-group">
                    <label for="inputNom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nom" value="<?php echo htmlspecialchars($row['nom']);?>">
                 
                </div>
				
		        <div class="form-group">
                    <label for="inputPrenom">Prenom</label>
                        <input type="text" name="prenom" class="form-control" id="prenom" value="<?php echo $prenom ?>">
                </div>			
		         
				<div class="form-group">
                    <label for="inputNoet" >N° d'étudiant</label>
                        <input type="number" name="noet" min="0" class="form-control"  value="<?php echo $noet ?>" >
                </div>
				
				<div class="form-group">
                    <label for="inputAnnee" >Année</label>
                        <input type="number" name="annee" min="0" class="form-control"  value="<?php echo $annee ?>"  >
                </div>
		
		        <div class="form-group">
                    <label for="inputFiliere">Filiere</label>
                        <input type="text" name="filiere" class="form-control" value="<?php echo $filiere ?>"  >
                </div>

                <div class="form-group">
                    <div class="col-xs-10 col-xs-offset-2">
                        <button type="submit" class="btn btn-primary">Valider</button>
						 <button type="reset" class="btn btn-primary">Recommencer</button>
                    </div>
                </div>

           </form>