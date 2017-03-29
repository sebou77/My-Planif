<?php
require_once ("Modules/mod_Connexion/modele_Connexion.php");
require_once ("Modules/mod_Connexion/vue_Connexion.php");
class ControleurConnexion extends ControleurGenerique{
			function messageAccueil(){
			$this->modele = new ModeleConnexion();
			if(!isset($_SESSION['jeton_connexion'])){
				//Jeton avec 15 secondes de validité
				$jeton = $this->modele->creerToken(15);
			}
			else{
				$jeton=$_SESSION['jeton_connexion'];
			}
			$this->vue = new VueConnexion();
			$this->vue->affiche($jeton);
		}
			
			public function getVue(){
			return $this->vue;	
		}
		public function getModele(){
			return $this->modele;	
		}
}
 
?> 
