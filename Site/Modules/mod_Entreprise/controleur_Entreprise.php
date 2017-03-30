<?php
require_once ("Modules/mod_Entreprise/modele_Entreprise.php");
require_once ("Modules/mod_Entreprise/vue_Entreprise.php");
class ControleurEntreprise extends ControleurGenerique{
	public function __construct(){
		$this->modele = new ModeleEntreprise();
		$this->vue = new VueEntreprise();
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
