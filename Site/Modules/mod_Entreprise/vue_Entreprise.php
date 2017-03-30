<?php
	require_once ("Include/vue_generique.php");
	class VueEntreprise extends VueGenerique{
		
			function __construct() {
				parent::__construct();
			
			}

			function CreateInfrastructure(){
				$this->titre="Créer Infrastructure";
				echo '
			<h1>Création d\'une infrastructure</h1>
			<button><a href="">Retour</a></button>
			<form action="">
				Nom: <input type="text" /> 
				Categorie:
				<select>
					<option>Salarié</option>
					<option>Equipement</option>
				</select>
				Pseudo: <input type="text" placeholder="inutile de remplir pour un équipement"/> 
				Mot de passe: <input type="text" placeholder="inutile de remplir pour un équipement"/>
				Travaille de :<input type="time"/>
				à :<input type="time"/>
				Du: <input type="text" placeholder="Lundi,Mardi,etc" />
				Au: <input type="text" placeholder="Vendredi,Samedi,etc"/>
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
