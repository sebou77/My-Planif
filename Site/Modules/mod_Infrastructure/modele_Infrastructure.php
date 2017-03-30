<?php
	class ModeleInfrastructure extends ModeleGenerique{
        function CreerConsultation($nom,$temps){
            $conn = parent::getPDO();
            $query = $conn->prepare("SELECT idInfrastructure FROM `infrastructure` where idUtilisateur=?;");
            $query->execute(array($_SESSION["idUtilisateur"]));
            $idInfrastructure = $query->fetch();
            $query=$conn->prepare("INSERT INTO `reservation` (`nom`, `tempsReservation`, `idInfrastructure`) VALUES (?,?,?);");
            $query= $query->execute(array($nom,$temps,$idInfrastructure[0]));
            if($query){
                echo "<script>alert('Consultation créer')</script>";
            }else{
                echo "<script>alert('Une erreur a eu lieu lors de la création')</script>";
            }
        }

        function CreerAbsence($debut,$fin,$raison){
            $conn = parent::getPDO();
            $query = $conn->prepare("SELECT idInfrastructure FROM `infrastructure` where idUtilisateur=?;");
            $query->execute(array($_SESSION["idUtilisateur"]));
            $idInfrastructure = $query->fetch();
            $query=$conn->prepare("INSERT INTO `absence` (`Debut`, `Fin`, `Raison`, `idInfrastructure`) VALUES (?,?,?,?);");
            $query= $query->execute(array($debut,$fin,$raison,$idInfrastructure[0]));
            if($query){
                echo "<script>alert('Absence créer')</script>";
            }else{
                echo "<script>alert('Une erreur a eu lieu lors de la création')</script>";
            }
        }
	}
?>
