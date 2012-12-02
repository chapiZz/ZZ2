#include "mat.hpp"

Mat::Mat(ifstream infile)
{
	int i,j;
	double d;
	
	getline (infile, line);
	getline(iss, value, ';');
  
	iss2.str(value);
	iss2.clear();
	iss2 >> i;
	n = i;
  
	mat = new double * [n];
	for (int i = 0; i < n; ++i) 
	{
		getline(iss, value, ';');
		nom_villes.push_back(value);
    
		//Allocation de la mémoire pour la matrice
		mat [i] = new double [n];
		for (int j = 0; j < n ; ++j)
		{
			mat[i][j] = 0;
		}
	}
  
	i = 0;
	while (getline (infile,line))
	{
		iss.str(line);
		iss.clear();
		getline(iss,value,';');
		j = 0;
		while(getline(iss,value,';'))
		{
			iss2.str(value);
			iss2.clear();
			iss2 >> d;
			mat[i][j] = d;
			j++;
		}
		i++; 
	}
}

void Mat::affichage() const
{
	cout << "\t";
	for (int i = 0; i < n; ++i) 
	{
		cout << nom_villes[i] << "\t";    
	}
	cout << endl;
	for (int i = 0; i < n; ++i) 
	{
		cout << nom_villes[i] << "\t";
		for (int j = 0; j < n ; ++j)
		{
			cout << mat[i][j] << "\t";
		}
		cout << endl;
	}
}

Mat::~Mat()
{
	  
	for (int i = 0; i < n; ++i)
	{
		delete [] mat[i];
	}
	delete [] mat;
    
}
