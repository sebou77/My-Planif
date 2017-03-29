<?php
	class ModeleInscription extends ModeleGenerique{
	public function InscrireClient($nom,$prenom,$email,$mdp){
				$conn = parent::getPDO();
				$mdp = password_hash($mdp,PASSWORD_DEFAULT);
				$query=$conn->prepare("INSERT INTO `utilisateur` (`psd`, `mdp`, `categorie`) VALUES (?,?,?);");
				$query= $query->execute(array($nom,$mdp,'client'));
				if($query){
					var_dump($query);
					$query = $conn->prepare("SELECT idUtilisateur FROM `utilisateur` ORDER BY idUtilisateur DESC LIMIT 1;");
					$query->execute();
					$id = $query->fetch();
					$query=$conn->prepare("INSERT INTO `client` (`nom`, `prenom`, `adrMail`, `idUtilisateur`) VALUES (?,?,?,?);");
					$query = $query->execute(array($nom,$prenom,$email,$id[0]));
					if($query){
						echo "<script>alert('Inscription réussi')</script>";
					}else{
                        echo "<script>alert('Une erreur a eu lieu lors de l\'inscription')</script>";
					}
				}else{
                    echo "<script>alert('Ce mot de passe est déjà utilisé')</script>";
				}
	}
	public function InscrireEntreprise($nom,$pseudo,$mdp){
        $conn = parent::getPDO();
        $mdp = password_hash($mdp,PASSWORD_DEFAULT);
        $query=$conn->prepare("INSERT INTO `utilisateur` (`psd`, `mdp`, `categorie`) VALUES (?,?,?);");
        $query= $query->execute(array($nom,$mdp,'entreprise'));
        if($query){
            $query = $conn->prepare("SELECT idUtilisateur FROM `utilisateur` ORDER BY idUtilisateur DESC LIMIT 1;");
            $query->execute();
            $id = $query->fetch();
            var_dump($id[0]);
            $query=$conn->prepare("INSERT INTO `entreprise` (`nom`, `prevision`,`idUtilisateur`) VALUES (?,?,?);");
            $query = $query->execute(array($pseudo,null,$id[0]));
            if($query){
                echo "<script>alert('Inscription réussi')</script>";
			}else{
                echo "<script>alert('Une erreur a eu lieu lors de l\'inscription')</script>";
            }
		}else{
            echo "<script>alert('Ce mot de passe est déjà utilisé')</script>";
		}

	}
}
?>
