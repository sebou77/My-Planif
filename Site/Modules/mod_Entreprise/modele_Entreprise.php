<?php
	class ModeleEntreprise extends ModeleGenerique{
		function CreateInfrastructure($nom,$categorie,$psd,$mdp,$com,$ter,$dbt,$fin){
			var_dump($nom);
            var_dump($categorie);
            var_dump($psd);
            var_dump($mdp);
            var_dump($com);
            var_dump($ter);
            var_dump($dbt);
            var_dump($fin);
		}

		function CreerSalarie($nom,$psd,$mdp,$com,$ter,$dbt,$fin){
            $conn = parent::getPDO();
            $mdp = password_hash($mdp,PASSWORD_DEFAULT);
            $query=$conn->prepare("INSERT INTO `utilisateur` (`psd`, `mdp`, `categorie`) VALUES (?,?,?);");
            $query= $query->execute(array($psd,$mdp,'salarie'));
            if($query){
                $query = $conn->prepare("SELECT idUtilisateur FROM `utilisateur` ORDER BY idUtilisateur DESC LIMIT 1;");
                $query->execute();
                $id = $query->fetch();
                $query = $conn->prepare("SELECT idEntreprise FROM `entreprise` where idUtilisateur=?;");
                $query->execute(array($_SESSION["idUtilisateur"]));
                $idEntreprise = $query->fetch();
                $query=$conn->prepare("INSERT INTO `infrastructure` (`nom`, `categorie`, `Horaire`, `Semaine`, `idEntreprise`, `idUtilisateur`) VALUES (?,?,?,?,?,?);");
                $query = $query->execute(array($nom,'salarie',$com+'-'+$ter,$dbt+'-'+$fin,$idEntreprise[0],$id[0]));
                if($query){
                    echo "<script>alert('Inscription réussi')</script>";
                }else{
                    echo "<script>alert('Une erreur a eu lieu lors de l\'inscription')</script>";
                }
            }else{
                echo "<script>alert('Ce mot de passe est déjà utilisé')</script>";
            }
		}

		function CreerEquipement($nom,$com,$ter,$dbt,$fin){
            $conn = parent::getPDO();
            $query = $conn->prepare("SELECT idUtilisateur FROM `utilisateur` ORDER BY idUtilisateur DESC LIMIT 1;");
            $query->execute();
            $id = $query->fetch();
            $query = $conn->prepare("SELECT idEntreprise FROM `entreprise` where idUtilisateur=?;");
            $query->execute(array($_SESSION['idUtilisateur']));
            $idEntreprise = $query->fetch();
            $query=$conn->prepare("INSERT INTO `infrastructure` (`nom`, `categorie`, `Horaire`, `Semaine`, `idEntreprise`, `idUtilisateur`) VALUES (?,?,?,?,?,?);");
            $query = $query->execute(array($nom,'equipement',$com+'-'+$ter,$dbt+'-'+$fin,$idEntreprise[0],$id[0]));
            if($query){
                echo "<script>alert('Inscription réussi')</script>";
            }else{
                echo "<script>alert('Une erreur a eu lieu lors de l\'inscription')</script>";
            }
		}
	}
?>
