
	<?php
	
	function verifDispoPseudo($pseudo,$ConnexionList)
	{
		if(isset($pseudo) && isset($ConnexionList))
		{
			for ($i=0; $i<count($ConnexionList); $i++)
			{
				$pseudoRecup = explode(" ", $ConnexionList[$i]);
				if ($pseudoRecup[0] == $pseudo)
				{
					return false;
				}
			}
			return true;
		}
		else
		{
			return false;
		}


				
		
	}
	
	function recherchePseudo($pseudo,$ConnexionList)
	{
		if(isset($pseudo) && isset($ConnexionList))
		{
			for ($i=0; $i<count($ConnexionList); $i++)
			{
				$pseudoRecup = explode(" ", $ConnexionList[$i]);
				if ($pseudoRecup[0] == $pseudo)
				{
					return $i;
				}
			}
			return false;
		}
		else
		{
			return false;
		}
	}

	
	function login()
	{
		echo "test";
		if(isset($_POST['pseudo']) )
		{
			if( strlen($_POST['pseudo']) >= 2 && strlen($_POST['pseudo']) <= 24)
			{
					if($ConnexionList = file('data/User'))
					{
						if(verifDispoPseudo($_POST['pseudo'],$ConnexionList))
						{
							$_SESSION['pseudo'] = $_POST['pseudo'];

							$value = $_POST['pseudo'];
							setcookie("Zzchat", $value);
							
							// standard line to represent an user
							$newUser = $_SESSION['pseudo']." ".$_SERVER['REQUEST_TIME']."\n";
							
							
							$ConnexionList[count($ConnexionList)] = $newUser;
							if(file_put_contents("data/User", implode($ConnexionList)))
							{
								// login ok, redirect to the chat
								header('Location: zzchat.php');   
							}
							else
							{
								if(isset($_POST['lang']))
								{
									header('Location: index.php?pseudo=ficerr&lang='.$_POST['lang']);  
								}
								else
								{
									header('Location: index.php?pseudo=ficerr');  
								}
							}
						}
						else
						{
							// error, redirect to index
							if(isset($_POST['lang']))
							{
								header('Location: index.php?pseudo=occ&lang='.$_POST['lang']);  
							}
							else
							{
								header('Location: index.php?pseudo=occ');  
							}
									
						}
					}
					else
					{
						// error, redirect to index
						if(isset($_POST['lang']))
						{
							header('Location: index.php?pseudo=ficusererr&lang='.$_POST['lang']);  
						}
						else
						{
							header('Location: index.php?pseudo=ficusererr');  
						}
					}
		
			}
			// error, redirect to index
			else
			{
				// Test to keep good language
				if(isset($_POST['lang']))
				{
					header('Location: index.php?pseudo=err&lang='.$_POST['lang']);  
				}
				else
				{
					header('Location: index.php?pseudo=err');  
				}
				
			}

				
		}
		else
		{
				echo "Erreur: Vous ne devriez pas être ici ... que cherchez vous à faire ?";
		}
	}
	
	
	function afficherUserCo($fichier)
	{
		$lines= file($fichier);
		if($lines)
		{
			foreach ($lines as $line) 
			{
				$chaine = explode(' ',$line);
				echo $chaine[0]."<br/>";
			}

		}
		else
		{
			echo "erreur d'ouverture du fichier";
		}
	}
	
	?>
