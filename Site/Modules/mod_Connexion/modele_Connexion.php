<?php
	class ModeleConnexion extends ModeleGenerique{
			public function Connexion($mdp,$pseudo){
				$conn = parent::getPDO();
			   	$res=$conn->prepare("SELECT * FROM `utilisateur` where psd=?");
				$res->execute(array($pseudo));
				$data = $res->fetch();
				if(password_verify($mdp, $data['mdp']) && $data['psd']==$pseudo) {
				//conn possible
					$_SESSION["idUtilisateur"]=$data['idUtilisateur'];
					return $data['categorie'];
				}
				else{
				//probleme (mauvais info rentrées)
					echo "<p>Erreur: Pseudo ou mot de passe incorrecte </p>";
					return null;
				}
			}

			public function Retour(){
                $conn = parent::getPDO();
                $res=$conn->prepare("SELECT categorie FROM `utilisateur` where idUtilisateur=?");
                $res->execute(array($_SESSION['idUtilisateur']));
                $data = $res->fetch();
                return $data['categorie'];
			}
	}
?>
