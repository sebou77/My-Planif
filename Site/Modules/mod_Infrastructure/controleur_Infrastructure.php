<?php
require_once ("Modules/mod_Infrastructure/modele_Infrastructure.php");
require_once ("Modules/mod_Infrastructure/vue_Infrastructure.php");
class ControleurInfrastructure extends ControleurGenerique{
	public function __construct(){
		$this->modele = new ModeleInfrastructure();
		$this->vue = new VueInfrastructure();
	}

	function ModeleCreer($nom,$categorie,$psd,$mdp,$com,$ter,$dbt,$fin){
		$this->getModele()->CreateInfrastructure($nom,$categorie,$psd,$mdp,$com,$ter,$dbt,$fin);
	}

    function VueCreer(){
		$this->getVue()->CreateInfrastructure();
	}
			
	public function getVue(){
		return $this->vue;
	}
	public function getModele(){
		return $this->modele;
	}
}
 
?> 
