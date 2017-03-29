<?php
	require_once('Include/module_generique.php');
	require_once("Modules/mod_Connexion/controleur_Connexion.php");
	class ModConnexion extends ModuleGenerique{
		public function __construct() {
			$this->controleur = new ControleurConnexion();
			$this->controleur->messageAccueil();	
		}
		public function getControleur(){
		return $this->controleur;
		
		}
	}

?>
