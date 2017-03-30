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
			<button><a href="index.php?action=Connexion">Retour</a></button>
			<form method="post" action="index.php?action=CreerInfrastructure">
				Nom: <input type="text" name="nom"/> 
				Categorie:
				<select name="categorie">
					<option value="salarie">Salarié</option>
					<option value="equipement">Equipement</option>
				</select>
				Pseudo: <input type="text" placeholder="inutile de remplir pour un équipement" name="psd"/> 
				Mot de passe: <input type="password" placeholder="inutile de remplir pour un équipement" name="mdp"/>
				Travaille de :<input type="time" name="Commence"/>
				à :<input type="time" name="Termine"/>
				Du: 
				<select name="Dbt">
				<option value="1">Lundi</option>
				<option value="2">Mardi</option>
				<option value="3">Mercredi</option>
				<option value="4">Jeudi</option>
				<option value="5">Vendredi</option>
				<option value="6">Samedi</option>
				<option value="7">Dimanche</option>
				</select>
				Au:
				<select name="Fin">
				<option value="1">Lundi</option>
				<option value="2">Mardi</option>
				<option value="3">Mercredi</option>
				<option value="4">Jeudi</option>
				<option value="5">Vendredi</option>
				<option value="6">Samedi</option>
				<option value="7">Dimanche</option>
				</select>
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
