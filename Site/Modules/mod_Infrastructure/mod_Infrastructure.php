<?php
	require_once('Include/module_generique.php');
	require_once("Modules/mod_Infrastructure/controleur_Infrastructure.php");
	class ModInfrastructure extends ModuleGenerique{
		public function __construct() {
			$this->controleur = new ControleurInfrastructure();
		}
		public function getControleur(){
		return $this->controleur;
		
		}
	}

?>
