<?php
    $db = new PDO("mysql:host=localhost;dbname=my-planif", "root", "");
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    $query = $db->prepare('Select * from `utilisateur` where psd=?');
    $query = $query->execute(array($pseudo));
    $data = $query->fetch();
    if(password_verify($mdp, $data['mdp']) && $data['psd']==$pseudo){
        echo "<p>Connexion reussi</p>";
        /*$query = $db->prepare('Select * from `client` where idUtilisateur=?');
        $query = $query->execute($data['idUtilisateur']);*/
    }else{
        echo "<p>Erreur pseudo ou mot de passe invalide</p>";
    }
?>