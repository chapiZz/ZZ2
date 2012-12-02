<?php

function formatTest($pseudo,$mess)
{
	$res='[pseudo]'.$pseudo.'[/pseudo][date]42[/date][mess]'.$mess.'[/mess]'."\n";	
	return $res;
}

function verifClose($chaine,$nb,$nbF,$balise)
{
	if(	$nb !=	$nbF )
	{
		$nbClose= $nb -$nbF;
		for($i=0;$i!=$nbClose;$i++)
		{
			$chaine=$chaine.$balise;
		}
	}
	return $chaine;
}

function miseEnForme($chaine)
{

	
	$chaine = str_replace("<", " ", $chaine);
	$chaine = str_replace(">", " ", $chaine);
	$chaine = str_replace("<", " ", $chaine);
	
	// Blod
	$nbBlod=0;
	$nbFBlod=0;
	$chaine = str_replace("[b]", "<strong>", $chaine,$nbBlod);
	$chaine = str_replace("[/b]","</strong>", $chaine,$nbFBlod); 
	
	// Italic
	$nbI=0;
	$nbFI=0;
	$chaine = str_replace("[i]", "<i>", $chaine, $nbI);
	$chaine = str_replace("[/i]","</i>", $chaine, $nbFI); 
	
	//underline
	$nbU=0;
	$nbFU=0;
	$chaine = str_replace("[u]", "<u>", $chaine,$nbU);
	$chaine = str_replace("[/u]","</u>", $chaine,$nbFU); 
	
	//Verif
	$chaine = verifClose($chaine,$nbBlod,$nbFBlod,"</strong>");
	$chaine = verifClose($chaine,$nbI,$nbFI,"</i>");
	$chaine = verifClose($chaine,$nbU,$nbFU,"</u>");
	


	return $chaine;
}

function writeMess($mess)
{
	if(isset($mess))
	{

		if($mess)
		{
			$fichier = fopen('../data/Mess', 'a');
			if($fichier )
			{
				fseek($fichier, 0);
				$chaine = miseEnForme($mess);
				fputs($fichier,formatTest($_SESSION['pseudo'],$chaine));
				fclose($fichier);
				$mess = 0;

			}
			else
			{
				echo "erreur de base de donnée";
			}
		}
	}
}
?>
