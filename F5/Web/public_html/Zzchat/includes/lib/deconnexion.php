
<?php
	function logout()
	{

		if($ConnexionList = file('../data/User'))
		{
			if(isset($_SESSION['pseudo']))
			{
				$i=recherchePseudo($_SESSION['pseudo'],$ConnexionList);
				if($i)
				{
					unset($ConnexionList[$i]);
					if(file_put_contents("../data/User", implode($ConnexionList)))
					{
						
						session_destroy(); 
						// login ok, redirect to the chat
						echo "Déconnexion effectué, redirection";
						header('Location: ../index.php');   
					}
					else
					{
						echo "erreur écriture";
					}
				}
				else
				{
					echo 'erreur pseudo i= '.$i;
				}
			}
			else
			{
				echo "erreur var session";
			}
		}
		else
		{
			echo "erreur ouverture fichier";
		}
	}
	
	?>
