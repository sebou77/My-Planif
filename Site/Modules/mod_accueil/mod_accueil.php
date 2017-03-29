<?php
	require_once('Include/module_generique.php');
	require_once("Modules/mod_accueil/controleur_accueil.php");
	require_once("Modules/mod_accueil/modele_accueil_exception.php");
	class ModAccueil extends ModuleGenerique{
		public function __construct() {
			$this->controleur = new ControleurAccueil();
			$this->controleur->messageAccueil();	
		}
		public function getControleur(){
		return $this->controleur;
		
		}
	}

?>