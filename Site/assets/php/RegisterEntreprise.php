<?php
$db = new PDO("mysql:host=localhost;dbname=my-planif", "root", "");
$nom = $_POST['nom'];
$pseudo = $_POST['pseudo'];
$mdp = password_hash($_POST['mdp'],PASSWORD_DEFAULT);
$query=$db->prepare("INSERT INTO `utilisateur` (`psd`, `mdp`) VALUES (?,?);");
$query= $query->execute(array($nom,$mdp));
$query = $db->prepare("SELECT idUtilisateur FROM `utilisateur` ORDER BY idUtilisateur DESC LIMIT 1;");
$query->execute();
$id = $query->fetch();
var_dump($id[0]);
$query=$db->prepare("INSERT INTO `entreprise` (`nom`, `prevision`,`idUtilisateur`) VALUES (?,?,?);");
$query = $query->execute(array($pseudo,null,$id[0]));
?>