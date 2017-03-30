<?php
require_once ("Modules/mod_Connexion/modele_Entreprise.php");
require_once ("Modules/mod_Connexion/vue_Entreprise.php");
class ControleurEntreprise extends ControleurGenerique{
			function messageAccueil($mdp,$psd){
			$this->modele = new ModeleEntreprise();
			$categorie = $this->getModele()->Connexion($mdp,$psd);
			$this->vue = new VueEntreprise();
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
