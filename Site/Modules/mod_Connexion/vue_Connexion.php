<?php
	require_once ("Include/vue_generique.php");
	class VueConnexion extends VueGenerique{
		
			function __construct() {
				parent::__construct();
			
			}

			function affiche($categorie){
				if($categorie=='client'){
					$this->titre = "Accueil Client";
                    echo '
					<!-- Home -->
					<div class="client">
						<h1>Accueil client</h1>
						<h2> Menu: </h2>
						<button><a href="index.php?action=Deconnexion">Deconnexion</a></button>
						<form>      
							<input type="submit" value="Réserver" onclick="getPage(\'Client\',\'Reserver_Client\')"/>
							<input type="submit" value="Modifier" onclick="getPage(\'Client\',\'Modifier_Client\')"/>
							<input type="submit" value="Supprimer" onclick="getPage(\'Client\',\'Supprimer_Client\')"/>
						</form>
					</div>';
				}else {
                    $this->titre = "Accueil Entreprise";
                    echo '
					<h1>Personnalisation de votre emploi du temps</h1>
					<h2>Infrastructure</h2>
					<button><a href="index.php?action=Deconnexion">Deconnexion</a></button>
					<form action="">
						<input type="submit" value="Creer" onclick="getPage(\'Entreprise\',\'Creation_Infrastructure\')"/>
						<input type="submit" value="Modifier" onclick="getPage(\'Entreprise\',\'Selection_Infrastructure\')"/>
						<input type="submit" value="Supprimer" onclick="getPage(\'Entreprise\',\'Supprimer_Infrastructure\')"/>
					</form>
					<h2>Prévision:</h2>
					<form action="">
                        Nom Entreprise: <input type="text" />
					</form>
					<form action="">
					<select> 
						<option> Option1</option>
						<option> Option2</option>
						<option> Option3</option>
					</select>
					</form>';
                }
		
			}
			

			function afficheConnecte(){
			echo '
				
				<!-- Home -->
				<div class="8u 12u(mobile)">
					<p> Connexion reussie </p>

				</div>';


			}
			function getTitre(){
				return $this->titre;			
			}
			function getContenu(){
				return $this->contenu;
			}
			
			
			
	}
	
?>
