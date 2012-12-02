
var pseudo = document.getElementById('pseudo');
var pass = document.getElementById('pass');
var button = document.getElementById('button');


//Vérification de la présence de l'identifiant					
//pseudo.addEventListener('onBlur',PseudoCheck, true);
//pseudo.addEventListener('onChange',PseudoCheck, true);
					

function testPseudo()
{
	if (pseudo.value.length > 2 && pseudo.value.length < 25) 
	{	
		return true;
	}
	else
	{
		return false;
	}
}



function PseudoCheck()
{
	pseudo = document.getElementById('pseudo');
	if (testPseudo() == false ) 
	{						
		pseudo.className = 'incorrect';
		button.disabled = 'disabled';
	
	}
	else
	{
		pseudo.className = 'correct';
		button.disabled = '';
	}
	
}




