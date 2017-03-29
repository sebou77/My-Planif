<?php
	ini_set('include_path', '/home/etudiants/info/alandrodie/local_html/TP4');
require_once ("Modules/mod_Inscription/modele_Inscription.php");
require_once ("Modules/mod_Inscription/vue_Inscription.php");
class ControleurInscription extends ControleurGenerique{
	private $jeton;
	function __construct() {
		$this->modele = new ModeleInscription();
		if(!isset($_SESSION['jeton_inscription'])){
			//Jeton avec 30 secondes de validité
			$this->jeton = $this->modele->creerToken(30);
		}
		else{
			$this->jeton=$_SESSION['jeton_inscription'];
		}
		$this->vue = new VueInscription();
	}
		
	public function getVue(){
		return $this->vue;
	}

	public function getClient(){
		$this->getVue()->afficheClient($this->jeton);
	}
    public function getEntreprise(){
        $this->getVue()->afficheEntreprise($this->jeton);
    }

	public function getModele(){
		return $this->modele;
	}
}
?>
