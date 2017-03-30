<?php
	require_once ("Include/vue_generique.php");
	class VueInfrastructure extends VueGenerique{
		
			function __construct() {
				parent::__construct();
			
			}

			function CreateConsultation(){
				$this->titre="Créer Consultation";
				echo '
			<h1>Création d\'une infrastructure</h1>
			<button><a href="index.php?action=Connexion">Retour</a></button>
			<form method="post" action="index.php?action=CreerConsultation">
				Nom: <input type="text" name="nom"/> 
				Temps requis:<input type="time" name="temps"/>
				<input type="submit" value="Creer"/> 
			</form>
				';
			}

			function getTitre(){
				return $this->titre;			
			}
			function getContenu(){
				return $this->contenu;
			}
			
			
			
	}
	
?>
