<?php

	class VueAccueil extends VueGenerique
    {

        function __construct()
        {
            parent::__construct();

        }

        function affiche($jeton)
        {
            $this->titre = "Accueil";
            echo '
				<h1>Accueil</h1>
				<h2> Connexion: </h2>
				<form method="POST" action="index.php?action=Connexion">
					pseudo: <input type="text" name="pseudo"/>
					Mot de passe:<input type="password" name="mdp"/>
					<input type="hidden" name="jeton" value="'.$jeton.'"/>
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
