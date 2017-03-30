<?php
require_once ("Modules/mod_accueil/modele_accueil.php");
require_once ("Modules/mod_accueil/vue_accueil.php");
class ControleurAccueil extends ControleurGenerique{
			function messageAccueil(){
				$this->modele = new ModeleAccueil();
                if(!isset($_SESSION['jeton_connexion'])){
                    //Jeton avec 15 secondes de validité
                    $jeton = $this->modele->creerToken(15);
                }
                else{
                    $jeton=$_SESSION['jeton_connexion'];
                }
				$this->vue = new VueAccueil();
				$this->vue->affiche($jeton);
			}
			
			public function getVue(){
			return $this->vue;	
		}
}
 
?> 