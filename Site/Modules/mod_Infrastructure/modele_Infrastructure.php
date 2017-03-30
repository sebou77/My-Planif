<?php
	class ModeleInfrastructure extends ModeleGenerique{
        function CreerConsultation($nom,$temps){
            $conn = parent::getPDO();
            $query = $conn->prepare("SELECT idInfrastructure FROM `infrastructure` where idUtilisateur=?;");
            $query->execute(array($_SESSION["idUtilisateur"]));
            $idInfrastructure = $query->fetch();
            var_dump($nom);
            var_dump($temps);
            var_dump($idInfrastructure[0]);
            var_dump($_SESSION["idUtilisateur"]);
            $query=$conn->prepare("INSERT INTO `reservation` (`nom`, `tempsReservation`, `idInfrastructure`) VALUES (?,?,?);");
            $query= $query->execute(array($nom,$temps,$idInfrastructure[0]));
            if($query){
                echo "<script>alert('Consultation créer')</script>";
            }else{
                echo "<script>alert('Une erreur a eu lieu lors de la création')</script>";
            }
        }
	}
?>
