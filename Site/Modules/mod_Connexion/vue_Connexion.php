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
				}else if($categorie=='entreprise') {
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
                }else{
                    $this->titre = "Accueil Infrastructure";
                    echo '
                    <h1>Accueil Infrastructure</h1>
                    <button><a href="index.php?action=Deconnexion">Deconnexion</a></button>
					<h2> Menu: </h2>
					<button><a href="index.php?action=CreerAbsence">S\'abscenter</a></button>
					<button>Consulter les reservations</button>
					<button><a href="index.php?action=CreerConsultation">Créer une Consultation</a></button>
					';
				}
		
			}

			function getTitre(){
				return $this->titre;			
			}
			function getContenu(){
				return $this->contenu;
			}
			
			
			
	}
	
?>
