<?php if(isset($_GET['deco']))
		{
			if($_GET['deco'] == 1)
			{
				session_destroy(); 
				header('Location:index.php');
			}
		}
		?>

			<?php include("includes/choixLangage.php");?>
			<p>			   
				<a href="../"> Retour au profil </a>
						
				<?php
					if(isset($_SESSION['pseudo']))
					{
						?>
						<a href="zzchat.php"> Accueil Zzchat </a>
						<a href="includes/logout.php">Déconnexion</a>
						<?php
					}
					else
					{
						?>
						<a href="index.php"> Accueil Zzchat </a>

					<?php
					}
					?>
			</p>

