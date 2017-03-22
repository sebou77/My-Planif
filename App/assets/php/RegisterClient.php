<?php
    $db = new PDO("mysql:host=localhost;dbname=my-planif", "root", "");
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $query=$db->prepare("INSERT INTO `utilisateur` (`psd`, `mdp`) VALUES (?,?);");
    $query= $query->execute(array($nom,$mdp));
    $query = $db->prepare("SELECT idUtilisateur FROM `utilisateur` ORDER BY idUtilisateur DESC LIMIT 1;");
    $query->execute();
    $id = $query->fetch();
    var_dump($id[0]);
    $query=$db->prepare("INSERT INTO `client` (`nom`, `prenom`, `adrMail`, `idUtilisateur`) VALUES (?,?,?,?);");
    $query = $query->execute(array($nom,$prenom,$email,$id[0]));
?>