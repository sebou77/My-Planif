<?php
	require_once('Include/module_generique.php');
	require_once("Modules/mod_Connexion/controleur_Entreprise.php");
	class ModEntreprise extends ModuleGenerique{
		public function __construct() {
			$this->controleur = new ControleurEntreprise();
		}
		public function getControleur(){
		return $this->controleur;
		
		}
	}

?>
