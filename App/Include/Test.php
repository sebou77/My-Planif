<?php
    $db = new PDO("mysql:host=localhost;dbname=my-planif", "root", "");
	$query = $db->query("SELECT * FROM client")->fetchAll(PDO::FETCH_OBJ);
	header("Content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"utf-8\" standalone='yes'?>";

	echo "<response>";
	foreach($query as $res) {
	    echo "<client>";
	        echo "<pseudo> $res->psd </pseudo>";
	        echo "<email> $res->adrMail </email>";
	        echo "<name> $res->nom </name>";
	        echo "<fname> $res->prenom </fname>";
	    echo "</client>";
	}
	echo "</response>";