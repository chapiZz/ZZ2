#pragma once 
#include <vector>
#include <string>
#include <sstream>
#include <iostream>
#include <fstream>
#include <time.h>
#include <stdlib.h>
#include <algorithm>
#include <cmath>

using namespace std;

class vc
{
	private :
	
	vector <int> _ordo; //Ordonnencement des villes
	vector <string> _nom_villes;//Nom des villes
	float _tpsexec;//Temps d'execution pour la resolution du pb en secondes
	float ** _matpb;//Matrice du problème de voyageur de commerce
	int _taille;//Taille du problème
	float _fobj;//Valeur de la fonction objectif pour l'ordonnencement "_ordo"
	
	public:
	
	vc(const char *);//Constructeur qui prend en entree le nom du fichier contenant le pb de vc
	~vc();//Destructeur
	void eval();//Fonction d'evaluation de la fonction objectif pour un ordonnencement
	void alea();//Fonction de génération aléatoire d'un ordonnencement
	void get_res();//Methode qui retourne l'état de l'objet après une methode d'optimisation
	void permut_alea();//Methode qui permet d'effectuer une permutation aléatoire dans un ordonnencement
	void permut(int i,int j);//Methode qui permet d'effectuer une permutation deterministe dans un ordonnencement (les deux indices a permuter sont en entree)
	float get_fobj();
	
	//Methodes d'optimisation que l'on peut effectuer
	void g_alea(const int nbiter);// Algorithme glouton qui se base sur une génération aléatoire d'ordonnencements "nbiter" est le nombre d'ordo générés
	void g_vpp();// Algorithme glouton qui se base sur le choix glouton de plus proche voisin
	void descente();//Methode de descente simple en utilisant un ordo de base donné par les plus proche voisins
	void recuit(const int itermax);//Optimisation par la methode de recuit simule (entree temperature minimum et nbe d'itérations max coefficient de decroissance)
	void g_alea_desc(const int itermax);//Methode combinant la marche aleatoire et la methode de descente (effectue une descente pour chaque generation aleatoire)
};
