/* 
 * File:   mat.h
 * Author: chapelle
 *
 * Created on November 19, 2012, 2:09 PM
 */

#ifndef _MAT_H
#define	_MAT_H

#include <string>
#include <cstring>
#include <sstream>
#include <vector>
#include <iostream>
#include <fstream>

using namespace std;

class Mat {
public:
    Mat(char *);
    void affichage() const;
    virtual ~Mat();
private:
    double ** mat;  //Matrice de distances
    vector <string> nom_villes; //Nom villes
    string line, value;
    static int complexiteEnum,iterateur;
    int n; //Nombre de villes


};

#endif	/* _MAT_H */

