/*
 *  Générateur aléatoire de fichier type matrice de distance csv
 *  Données double
 *  compilation : g++ genRomain.cpp -o executable
 */
#include <iostream>
#include <fstream>
#include <string>
#include <vector>

using namespace std;

int main( int argc, char ** argv )
{
  int size, p;
  double d;
  int nb_labs;
  vector<double> costs(0);
  int fact; // facteur multiplicateur des sommets
  int ifact;
  int s;
  int k;

  vector< vector<int> *> types;

  if( argc != 3 )
  {
    cout << "Utilisation:\n\tgenBd n f\n\tn : nombre de sommets"
         << "\tf : distance maximale\n";
    return -1;
  }

  size    = atoi(argv[1]);
  fact    = atoi(argv[2]);

  if( size > 26 )
  {
    cout << "Erreur non prise en compte des fichiers à plus de 26 objets\n";
  }
  
  costs.resize(size*size,0);

  srand(time(0));

  ofstream o("data.csv");
  
  for( int i = 0; i < size; ++i )
  {
    for( int j = i+1; j < size; ++j )
    {
      double ifact = (double) ( (double) rand() / (double) RAND_MAX * (fact-1) + 1);
      costs[i*size+j] = ifact;
      costs[j*size+i] = ifact;
    }
  }

  o << size;
  char c = 'A';
  for( int i = 0; i < size; ++ i )
  {
    o << ";" << c;
    ++c;
  }
  o << endl;

  c = 'A';
  for( int i = 0; i < size; ++i )
  {
    o << c;
    for( int j = 0; j < size; ++j )
    {
      o << ";" << costs[i*size+j];
    }
    o << endl;
    ++c;
  }

  return 0;
}
