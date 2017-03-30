<?php

	class VueAccueil extends VueGenerique
    {

        function __construct()
        {
            parent::__construct();

        }

        function affiche()
        {
            $this->titre = "Accueil";
            echo '
				<h1>Accueil</h1>
				<h2> Connexion: </h2>
				<form>
					pseudo: <input type="text" id="pseudo"/>
					Mot de passe:<input type="text" id="mdp"/>
					<input type="submit" value="envoyé"/>
				</form>
				<h2>Inscription</h2>
				
				<button><a href="index.php?action=Inscription&categorie=entreprise"/>Entreprise</a></button>
				<button><a href="index.php?action=Inscription&categorie=client"/>Client</a></button>
				';
        }

        function vueFAQ()
        {
            echo 'VUEFAQ test';


        }

        function getTitre()
        {
            return $this->titre;
        }

        function getContenu()
        {
            return $this->contenu;
        }

    }
	
?>
