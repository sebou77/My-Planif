<?php
    $db = new PDO("mysql:host=localhost;dbname=my-planif", "root", "");
    $nom = $_GET['nom'];
    $prenom = $_GET['prenom'];
    $email = $_GET['email'];
    $mdp = password_hash($_GET['mdp'],PASSWORD_DEFAULT);
    $query=$db->prepare("INSERT INTO `utilisateur` (`psd`, `mdp`) VALUES (?,?);");
    $query= $query->execute(array($nom,$mdp));
    header("Content-Type : text/xml");
    if($query){
        var_dump($query);
        $query = $db->prepare("SELECT idUtilisateur FROM `utilisateur` ORDER BY idUtilisateur DESC LIMIT 1;");
        $query->execute();
        $id = $query->fetch();
        $query=$db->prepare("INSERT INTO `client` (`nom`, `prenom`, `adrMail`, `idUtilisateur`) VALUES (?,?,?,?);");
        $query = $query->execute(array($nom,$prenom,$email,$id[0]));

        echo "<?xml version='1.0' charset='utf8' standalone='yes' >";
        echo"<ret>incription reussi</ret>";
    }else{
        header("Content-Type : text/xml");
        echo "<?xml version='1.0' charset='utf8' standalone='yes' >";
        echo"<ret>mot de passe déjà pris</ret>";
    }

?>