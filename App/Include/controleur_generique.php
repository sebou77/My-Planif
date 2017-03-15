<?php
class ControleurGenerique {
	public $modele;
	public $vue;
	
	public function __construct()  
    {  
         $this->modele = new ModeleGenerique();
			$this->VueGenerique = new VueGenerique();
    } 
}

?>