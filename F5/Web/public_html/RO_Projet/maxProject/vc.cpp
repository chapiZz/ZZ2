#include "vc.hpp"

using namespace std;

//Constructeur qui permet de charger le pb avec nom des villes la taille du pb et la matrice du pb
vc::vc(const char * nomfic)
{
	int i,j;
	float d;
	string line, value;

	ifstream infile(nomfic);
	if (infile == NULL)
	{
		cout << "Impossible d'ouvrir le fichier " <<endl;
		exit(1);
	}
	else
	{
		getline (infile, line);
		istringstream iss(line);
		istringstream iss2;
		getline(iss, value, ';');
		iss2.str(value);
		iss2.clear();
		iss2 >> i;
		_taille = i;
		_matpb = new float * [_taille];
		for (int it = 0; it < _taille; ++it) 
		{
			getline(iss, value, ';');
			_nom_villes.push_back(value);
			//Allocation de la mémoire pour la matrice
			_matpb [it] = new float [_taille];
			for (int jt = 0; jt < _taille ; ++jt)
			{
				_matpb[it][jt] = 0;
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
				_matpb[i][j] = d;
				j++;
			}
			i++;
		}
	}
}

//Destructeur
vc::~vc()
{
	for (int i = 0; i < _taille; ++i)
	{
		delete [] _matpb[i];
	}
	delete [] _matpb;
}

//Fonction d'evaluation de la fonction objectif pour uun ordonnencement donné en entree
void vc::eval()
{
	_fobj=0;
	for(int i=0; i<_taille-1; i++)
	{
		_fobj=_matpb[_ordo[i]][_ordo[i+1]]+_fobj;
	}
	_fobj=_matpb[_ordo[_taille-1]][_ordo[0]]+_fobj;

}
	
//Fonction de génération aléatoire d'un ordonnencement
void vc::alea()
{
	int i=0,j,entree;
	
	_ordo.clear();
	while(i<_taille)
	{
		entree=rand() % _taille;
		j=0;
		while(j<(int)_ordo.size() && _ordo[j]!=entree)
		{
			j++;
		}
		if(j==(int)_ordo.size())
		{
			_ordo.push_back(entree);
			i++;
		}
	}	
}

//Methode qui retourne l'état de l'objet après une methode d'optimisation
void vc::get_res()
{
	cout<<endl;
	cout<<"Voici le trajet retenu : "<<"[";
	for(int i=0;i<_taille;i++)
	{
		cout<<_nom_villes[_ordo[i]]<<" ";
	}
	cout<<_nom_villes[_ordo[0]]<<"]"<<endl;
	cout<<endl;
	cout<<"La distance parcouru est : "<<_fobj<<endl;
	cout<<endl;
	cout<<"le temps de calcul est de : "<<_tpsexec <<" secondes"<<endl;
	cout<<endl;
}

// Algorithme glouton qui se base sur une génération aléatoire d'ordonnencements "nbiter" est le nombre d'ordo générés
void vc::g_alea(const int nbiter)
{
	clock_t start,finish;
	vector <int> cour;
	float fobj;
	int k=0;
	
	start=clock();
	alea();
	cour=_ordo;
	eval();
	fobj=_fobj;
	while(k<nbiter)
	{
		alea();
		eval();
		if(_fobj<fobj)
		{
			fobj=_fobj;
			cour=_ordo;
		}
		k++;
	}
	_fobj=fobj;
	_ordo=cour;
	finish=clock();
	_tpsexec=((float)(finish-start))/CLOCKS_PER_SEC;
}

// Algorithme glouton qui se base sur le choix glouton de ville la plus proche
void vc::g_vpp()
{
	clock_t start,finish;
	float min;
	int ind_ordo=0,ind_tab;

	_ordo.clear();
	start=clock();
	//On choisit une ville de départ aléatoirement
	_ordo.push_back(rand()%_taille);
	//On remplit l'ordonnencement
	while(ind_ordo<_taille)
	{
		min=10000000;
		//On parcours la ligne correspondant à la ville de départ
		for(int j=0; j<_taille;j++)
		{
			//Si la ville de départ est différente de la ville d'arrivée
			if(_ordo[ind_ordo]!=j && find(_ordo.begin(), _ordo.end(),j)==_ordo.end() && min>_matpb[_ordo[ind_ordo]][j])
			{
				ind_tab=j;
			}
		}
		_ordo.push_back(ind_tab);
		ind_ordo++;
	}
	finish=clock();
	_tpsexec=((float)(finish-start))/CLOCKS_PER_SEC;
}

//Methode qui permet d'effectuer une permutation aléatoire dans un ordonnencement
void vc::permut_alea()
{
	int i=0,j=0;
	int tmp;

	while(j==i)
	{
		i=rand()%_taille;
		j=rand()%_taille;
	}
	tmp=_ordo[i];
	_ordo[i]=_ordo[j];
	_ordo[j]=tmp;
}

//Methode qui permet d'effectuer une permutation deterministe dans un ordonnencement (les deux indices a permuter sont en entree)
void vc::permut(int i,int j)
{
	int tmp;
	
	if(i!=j)
	{
		tmp=_ordo[i];
		_ordo[i]=_ordo[j];
		_ordo[j]=tmp;
	}
}

//Methode de descente simple en utilisant un ordo de base donné par les plus proche voisins	
void vc::descente()
{
	clock_t start,finish;
	vector <int> cour;
	float fobj;
	int i=0,j;
	
	start=clock();
	//On prend un ordonnencement de depart
	g_vpp();
	cour=_ordo;
	eval();
	fobj=_fobj;
	//On recherche une meilleurre solution dans le voisinage de la solution actuelle
	while(i<_taille-1)
	{
		j=i+1;
		while(j<_taille)
		{
			_ordo=cour;
			permut(i,j);
			eval();
			if(_fobj<fobj)
			{
				//On change de solution actuelle et on recommence la rechreche dans le voisinage de cette solution
				fobj=_fobj;
				cour=_ordo;
				j=1;
				i=0;
			}
			else
			{
				j++;
			}
		}
		i++;
	}
	_fobj=fobj;
	_ordo=cour;
	finish=clock();
	_tpsexec=((float)(finish-start))/CLOCKS_PER_SEC;
}

//Optimisation par la methode de recuit simule (entree temperature min et nbe d'itérations max et coefficient de decroissance)
void vc::recuit(const int itermax)
{
	clock_t start,finish;
	vector <int> cour;
	float fobj,Temp,r;
	int iter,stop=itermax;

	start=clock();
	//On prend un ordonnencement de depart
	g_vpp();
	cour=_ordo;
	eval();
	fobj=_fobj;
	cout<<"solution de depart"<<endl;
	get_res();
	//Initialisation de la temperature
	Temp=-25.8537/(log(0.6)/log(2));
	while(Temp>0.01)
	{
		iter=0;
		while(iter<stop)
		{	
			//On choisit une solution dans le voisinage de la solution courante
			permut_alea();
			eval();
			if(_fobj<fobj)
			{
				fobj=_fobj;
				cour=_ordo;
			}
			else
			{
				r=rand()/RAND_MAX;
				if(r<=exp((fobj-_fobj)/Temp))
				{
					cour=_ordo;
				}
			}
			iter++;
		}
		Temp=Temp*0.99;
		if(Temp<0.05)
		{
			stop=1000*itermax;
		}
	}
	_fobj=fobj;
	_ordo=cour;
	finish=clock();
	_tpsexec=((float)(finish-start))/CLOCKS_PER_SEC;
	
}

//Methode combinant la marche aleatoire et la methode de descente (effectue une descente pour chaque generation aleatoire)
void vc::g_alea_desc(const int itermax)
{
	vector <int> cour,cour2;
	float fobj,fobj2;
	int i,j;
	clock_t start,finish;
	
	start=clock();
	alea();
	cour2=_ordo;
	eval();
	fobj2=_fobj;
	for(int k=0; k<itermax; k++)
	{
		alea();
		cour=_ordo;
		eval();
		fobj=_fobj;
		i=0;
		while(i<_taille-1)
		{
			j=i+1;
			while(j<_taille)
			{
				_ordo=cour;
				permut(i,j);
				eval();
				if(_fobj<fobj)
				{
					//On change de solution actuelle et on recommence la rechreche dans le voisinage de cette solution
					fobj=_fobj;
					cour=_ordo;
					j=1;
					i=0;
				}
				else
				{
					j++;
				}
			}
			i++;
		}
		if(fobj<fobj2)
		{
			fobj2=fobj;
			cour2=cour;
		}
	}
	_ordo=cour2;
	_fobj=fobj2;
	finish=clock();
	_tpsexec=((float)(finish-start))/CLOCKS_PER_SEC;
}
		
