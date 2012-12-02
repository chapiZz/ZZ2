		<p> 
				<form method="get" action="index.php" >
				   <p>
					  
						<?php 
						if($lang=='fr')
						{
						?>
							<label for="lang">Langue : </label>
							<select name="lang" id="lang">
							<option value="fr">Français</option>
							<option value="eng">anglais</option>							
							</select>
							<input type="submit" value="OK" title="Valider le changement de language" />
							
						   <?php
						}
						else
						{
					   ?>
							<label for="lang">Language : </label>
							<select name="lang" id="lang">
							<option value="eng">English</option>
							<option value="fr">French</option>							
							</select>
							<input type="submit" value="OK" title="Validate choice" />
							
					<?php 
						}
					?>

				   </p>
				</form>
	
