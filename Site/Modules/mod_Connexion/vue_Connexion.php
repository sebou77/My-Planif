<?php
	require_once ("Include/vue_generique.php");
	class VueConnexion extends VueGenerique{
		
			function __construct() {
				parent::__construct();
			
			}

			function affiche($jeton){
				$this->titre = "Connexion";
				echo '
			<!-- Home -->
			<div class="wrapper style1 first">
				<form method="POST" action="index.php?action=Connexion" >
					<label>pseudo : <input type="text" name="pseudoConn" value=""/></label><br/>
					<label>mot de passe : <input type="password" name="mdpConn" value=""/></label><br/>
					<input type="hidden" name="jeton" value="'.$jeton.'"/>
					<input type="submit" value="Connexion"/>
					</form>


			</div>';
		
			}
			

			function afficheConnecte(){
			echo '
				
				<!-- Home -->
				<div class="8u 12u(mobile)">
					<p> Connexion reussie </p>

				</div>';


			}
			function getTitre(){
				$this->titre = "Connexion";
				return $this->titre;			
			}
			function getContenu(){
				return $this->contenu;
			}
			
			
			
	}
	
?>
