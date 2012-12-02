
		<?php include("includes/tete.php"); ?>

		<?php
		// ====================  Title ====================
			if($lang == 'fr')
			{				
				echo "Accueil ZzChat";
			}
			else
			{		
				echo "Home ZzChat";		 
			}		
		?>

		
		<?php
		
		//=========== standard head & menu ===================
		
		 include("includes/entete.php"); 
		 
		?>

		<p>
			<?php 

			// ==================== Greeting ====================
			if( $lang == 'fr')
			{
				echo "Bienvenue sur ZzChat. Ce site vous permet de discuter entre Zz.";
			}
			else
			{
				echo "Welcome on ZzChat. This website allow you to speak with other Zz.";
			}
			?>

			
				<div id="login">
				
				<!-- ==================== Login Form ======================= -->
						<form method="post" action="login.php" id="longinform" >
							
							<p>
								<label for="pseudo">
									<?php if( $lang == 'fr')
									{
										echo "Votre pseudo";
									}
									else
									{
										echo "Your ID";
									}
									?>:

								</label>
								<input 	type="text" name="pseudo" id="pseudo" <?php include("includes/testCookies.php");?> 
										onkeypress="PseudoCheck()" onBlur="PseudoCheck()" onKeyUp="PseudoCheck()" /><span class="infoPseudo" > </span></p>

				
							<p>
								<input type="hidden" name="lang" value="<?php echo $lang; ?>" /> 
								<input type="submit" value="<?php if( $lang == 'fr')
									{
										echo "Valider";
									}
									else
									{
										echo "Submit";
									}
									?>" id="button"/>
							</p>

						</form>
							<p>
								<?php 
								//============== Error pseudo ============================
								
									if(isset($_GET['pseudo']))

									{
										//========== invalid pseudo ======================
										if($_GET['pseudo'] == "err")
										{
											if( $lang == 'fr')
											{
												echo " Pseudo invalide ou absent "; 
											}
											else
											{
												echo " Please enter a valid pseudo "; 
											}
										}
										
										//========= Pseudo isn't free =====================
										else if($_GET['pseudo'] == "occ")
										{
											if( $lang == 'fr')
											{
												echo " Pseudo déjà pris "; 
											}
											else
											{
												echo " Pseudo not free "; 
											}
										}
										//========= file problem =====================
										else if($_GET['pseudo'] == "ficusererr")
										{
											if( $lang == 'fr')
											{
												echo " Erreur "; 
											}
											else
											{
												echo " Error "; 
											}
										}
									}
									?>

							</p>
				</div>

		</p>
		<script src="script.js" ></script>
				

<?php

//================ Standard footer =====================

 include("includes/footer.php"); 
 
 ?>
