<?php

function miseEnForme($chaine)
{
	$nbBlod=0;
	$nbFBlod=0;
	// Blod
	$chaine = str_replace("[b]", "<strong>", $chaine,$nbBlod);
	$chaine = str_replace("[/b]","</strong>", $chaine,$nbFBlod); 
	
	$chaine = str_replace("[i]", "<i>", $chaine);
	$chaine = str_replace("[/i]","</i>", $chaine); 
	
	$chaine = str_replace("[u]", "<u>", $chaine);
	$chaine = str_replace("[/u]","</u>", $chaine); 
	
	return $chaine;
}

function scanLigne($ligne)
{
	if(preg_match('#\[pseudo\].*\[/pseudo\]\[date\].*\[/date\]\[mess\].*\[/mess\]#isU',$ligne))
	{
		if(strlen($ligne) >= 300)
		{
			$ligne = "Limité à 300 caractéres <br/>";
		}
		else
		{
			$ligne=preg_replace('#\[pseudo\](.*)\[/pseudo\]\[date\](.*)\[/date\]\[mess\](.*)\[/mess\]#isU',
			'<strong>$1</strong> a &eacute;crit &agrave; date $2 : $3 <br/>',$ligne);
			//$ligne=miseEnForme($ligne);
		}
	}
	else
	{
		$ligne = "Action non autoris&eacute;<br/>";
	}
	return $ligne;
}

function scanFichier($fichier)
{
	
	$lines= file($fichier);

	if($lines)
	{
		foreach ($lines as $line) {
			echo scanLigne($line);
	}

	}
	else
	{
		echo "erreur d'ouverture du fichier";
	}

}

?>
