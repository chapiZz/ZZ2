#-------------------------------------------------------------------------------#
#								Makefile										#
#-------------------------------------------------------------------------------#

#---Options de compilation---#
CFLAGS = -g -Wall -ansi -pedantic -Wextra
#---Librairies à inclure : par exemple -lm pour la librairie math---#
LDFLAGS = 
#---Compilateur utilisé---#
CC = g++
#---Fichiers sources : ici tous les points cpp du repertoire courant sont pris---#
SRC= $(wildcard *.cpp)
#---Liste des fichiers objets---#
OBJ= $(SRC:.cpp=.o)
#---Nom de l'exe à changer à chaque programme : eviter test---#
EXEC= main

all: $(EXEC)

$(EXEC): $(OBJ)
	@$(CC) -o $@ $^ $(LDFLAGS)

%.o: %.cpp
	@$(CC) -o $@ -c $< $(CFLAGS)

clean:
	@rm -f *.o
	@rm $(EXEC)

run:
	@$(EXEC)
	
dep:
	$(CC) -MM *.cpp > makefile.dep
	
include makefile.dep


#---Utilisation du makefile---#
#  1) touch makefile.dep      #
#  2) make dep                #
#  3) make                    #
#-----------------------------#
