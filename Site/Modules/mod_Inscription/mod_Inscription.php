<?php
	require_once("Include/module_generique.php");
	require_once("Modules/mod_Inscription/controleur_Inscription.php");
	class ModInscription extends ModuleGenerique{
		public function __construct() {
			$this->controleur = new ControleurInscription();
	}
	}
?>
    				
   		
