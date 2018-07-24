 <form class="col-sm-5 col-sm-offset-3 " method="POST" >
                <legend><strong>Modifier un groupe </strong></legend>
		

                <div class="form-group">
                    <label for="inputIntitule">Intitule</label>
                        <input type="text" name="intitule" class="form-control" value="<?php echo $intitule ?>" >
                 
                </div>


                <div class="form-group">
                    <div class="col-xs-10 col-xs-offset-2">
                        <button type="submit" class="btn btn-primary">Valider</button>
						 <button type="reset" class="btn btn-primary">Recommencer</button>
                    </div>
                </div>

           </form>