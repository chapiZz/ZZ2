/* 
 * File:   main.cpp
 * Author: chapelle
 *
 * Created on November 19, 2012, 2:08 PM
 */

#include <string>
#include <iostream>
#include <cstring>
#include <sstream>
#include <fstream>
#include "mat.h"

using namespace std;
/*
 * 
 */
int main(int argc, char** argv) {

  



    if(argc < 2)
    {
    	cout << "Il faut donner le nom du fichier à lire.\n";
	return 0;
    }



    Mat mat(argv[1]);

    mat.affichage();
    
    return (EXIT_SUCCESS);
}

