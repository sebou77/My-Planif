<?php
require_once ("Modules/mod_Connexion/modele_Connexion.php");
require_once ("Modules/mod_Connexion/vue_Connexion.php");
class ControleurConnexion extends ControleurGenerique{
			function messageAccueil($mdp,$psd){
			$this->modele = new ModeleConnexion();
			$categorie = $this->getModele()->Connexion($mdp,$psd);
			$this->vue = new VueConnexion();
			$this->getVue()->affiche($categorie);
		}
			
			public function getVue(){
			return $this->vue;	
		}
		public function getModele(){
			return $this->modele;	
		}
}
 
?> 
