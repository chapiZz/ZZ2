#include <iostream>
#include <time.h>
#include <stdlib.h>
#include "vc.hpp"

using namespace std;

int main(int argc, char **argv)
{
	//Initialisation du germe pour la generation aléatoire
	srand(time(0));
	if(argc<2)
	{
		cout<<"Il faut donner un fichier en entree"<<endl;
	}
	else
	{
		vc test(argv[1]);

		test.g_vpp();
		test.eval();
		test.get_res();
		test.g_alea(10000);
		test.get_res();
		test.descente();
		test.get_res();
		test.g_alea_desc(10000);
		test.get_res();
					
	}	
}
