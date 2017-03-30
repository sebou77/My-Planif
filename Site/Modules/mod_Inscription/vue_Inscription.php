<?php
	require_once ("Include/vue_generique.php");
	class VueInscription extends VueGenerique{
		
			function __construct() {
				parent::__construct();
			
			}
			
			function afficheClient($jeton){
				
				$this->titre = "Inscription Client";
				echo '
			<!-- Home -->
			<div class="Inscription">
			<h1>Inscription Client</h1>
			<button><a href="index.php?action=Accueil"/>Retour</a></button><br/>
			<form method="POST" class="myForm" action="index.php?action=Inscription&categorie=client">
				Nom: <input type="text"  name="nom"/><br/>
				prenom: <input type="text" name="prenom"/><br/>
				Email:<input type="email" name="email"/><br/>
				Mot de passe: <input type="password" name="mdp"/><br/>
				<input type="hidden" name="jeton" value="'.$jeton.'"/>
				<input type="submit" value="S\'inscrire"/>
			</form>
			</div>';
		
			}

			function afficheEntreprise($jeton){

                $this->titre = "Inscription Entreprise";
                echo '
			<!-- Home -->
			<div>
			<h1>Inscription Entreprise</h1>
			<button><a href="index.php?action=Accueil">Retour</a></button><br/>
			<form method="POST" class="myForm" action="index.php?action=Inscription&categorie=entreprise">
				Nom Entreprise: <input type="text" name="nom"/><br/>
				pseudo: <input type="text" name="pseudo"/><br/>
				Mot de passe: <input type="password" name="mdp"/><br/>
				<input type="hidden" name="jeton" value="'.$jeton.'"/>
				<input type="submit" value="S\'inscrire"/>
			</form>
			</div>';
			}

			function getTitre(){
				$this->titre = "Inscription Client";
				return $this->titre;			
			}
			function getContenu(){
				return $this->contenu;
			}
			
			
			
	}
	
?>
