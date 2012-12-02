class Mat
{
	private:
			double ** mat;  //Matrice de distances
			vector <string> nom_villes; //Nom villes
			string line, value;
			istringstream iss(line);
			istringstream iss2;
			int n; //Nombre de villes
			
	public:
		void Mat();
		void affichage() const;
}
