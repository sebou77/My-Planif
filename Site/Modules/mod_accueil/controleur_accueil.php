<?php
require_once ("Modules/mod_accueil/modele_accueil.php");
require_once ("Modules/mod_accueil/vue_accueil.php");
class ControleurAccueil extends ControleurGenerique{
			function messageAccueil(){
				$this->modele = new ModeleAccueil();
				$this->vue = new VueAccueil();
				$this->vue->affiche();
			}
			
			public function getVue(){
			return $this->vue;	
		}
}
 
?> 