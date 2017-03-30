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
					<div>
					<button><a href="index.php?action=CreerInfrastructure">Créer</a></button>
					<button><a href="index.php?action=ModifierInfrastructure">Modifier</a></button>
					<button><a href="index.php?action=SupprimerInfrastructure">Supprimer</a></button>
					</div>';
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
