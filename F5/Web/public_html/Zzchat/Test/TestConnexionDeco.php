<?php

require_once("../includes/lib/gestionPseudo.php");

class TestConnexionDeco extends PHPUnit_Framework_TestCase{

	public function setUp()
	{
		echo "Lancement du processus de test des mécanisme de connexion et de déconnexion\n";
	}

	public function testVerifDispoPseudo()
	{
		echo "Lancement du test de la fonction verifDispoPseudo(pseudo,tab) \n";
	
		$pseudo = 'test';
		
		$tab = array ('François 025555', 'test 55856', 'Nicole 558665', 'Véronique 45221', 'Benoît 25596454');
		$this->assertTrue(!verifDispoPseudo($pseudo,$tab));
		
		$tab2 = array ('François 025555', 'Nicole 558665', 'Véronique 45221', 'Benoît 25596454');
		$this->assertTrue(verifDispoPseudo($pseudo,$tab2));
	}
	
	public function tearDown()
	{
		echo "Test des services de connexion et de déconnexion terminé \n";
	}
}
?>
