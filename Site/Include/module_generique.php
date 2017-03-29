<?php
	
	class ModuleGenerique {
		public $controleur;
	
	function __construct(){
		$controleur = new ControleurGenerique;
	}
	public function  getControleur(){
		return $this->controleur;	
	}
}
?>
