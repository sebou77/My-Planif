<?php
    $db = new PDO("mysql:host=localhost;dbname=my-planif", "root", "");
    /*$query=$conn->prepare("INSERT INTO `Utilisateur` (pseudo, mdp) VALUES (?,?);");
    $query = $query->execute(array($pseudo,$mdp));*/

    header("Content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"utf-8\" standalone='yes'?>";