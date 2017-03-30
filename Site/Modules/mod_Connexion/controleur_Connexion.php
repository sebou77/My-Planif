<?php
require_once ("Modules/mod_Connexion/modele_Connexion.php");
require_once ("Modules/mod_Connexion/vue_Connexion.php");
class ControleurConnexion extends ControleurGenerique{
			public function __construct(){
                $this->modele = new ModeleConnexion();
                $this->vue = new VueConnexion();
            }

    		function messageAccueil($mdp,$psd){
				$categorie = $this->getModele()->Connexion($mdp,$psd);
				$this->getVue()->affiche($categorie);
			}

			function messageRetour(){
                $categorie = $this->getModele()->Retour();
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
