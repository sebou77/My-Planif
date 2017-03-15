<?php
	class VueGenerique{
		public $contenu; 
		public $titre;
		
		function __construct(){
			$this->contenu = "";
			$this->titre = "";
			ob_start();	
		}
		
		function tamponVersContenu(){
			$tampon = ob_get_clean();
			$this->contenu .= $tampon;
			return $tampon;
		}
		
		function vue_erreur($message){
			
		echo "<font color='red'>$message</font>";
		
		}
		
		function vue_confirm($message){
			
		echo "<font color='green'>$message</font>";
		
		}
		
	}
	
	/*
	Dans VueGenerique, créez une fonction qui permet de récupérer le tampon et de le concaténer avec la variable contenu
	. Appelez cette fonction "tamponVersContenu" Pour récupérer le contenu du tampon, utilisez ob_get_clean().
	 Cette fonction renvoie le tampon et le remet à zéro.

Créez également la fonction vue_erreur qui permet d'afficher un message d'erreur passé en paramètre dans un style
 qui va bien (tout en rouge par exemple) et la fonction vue_confirm qui permet d'afficher un message de confirmation
  passé en paramètre dans un style qui va bien également (tout en vert par exemple).
	
	
	*/
?>