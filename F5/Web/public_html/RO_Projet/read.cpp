#include <string>
#include <cstring>
#include <sstream>
#include <vector>
#include <iostream>
#include <fstream>

#include "mat.hpp"

using namespace std;



int main (int argc, const char * argv[]) 
{ 	
	Mat *mat;


	
	if(argc < 2)
	{
		cout << "Il faut donner le nom du fichier à lire.\n";
		return 0;
	}  
  
	ifstream infile(argv[1]);
	

	
	if (infile == NULL)
	{
		cout << "Impossible d'ouvrir la matrice " << argv[1] <<endl;
		abort();
	}

	mat=new mat(infile);

	mat.affichage();
}
