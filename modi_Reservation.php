<?php
try{
$bdd-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd = new PDO('mysql:host=localhost;dbname=my-planif', 'root', '');
}
catch(Exception $e){
die('Erreur : '.$e->getMessage());
}

if(isset($POST['nom']) && isset($_POST['tempsReservation'])){
	$sql = 'UPDATE `reservation`
	SET
		`nom` = \''.$_POST['nom'].'\'
		`tempsReservation` = \''.$_POST['tempsReservation'].'\'
	WHERE	
		'idReservation' = '.$_POST['idReservation'];
$connexion->exec($sql);		
}

$reponse = $bdd -> query('SELECT * FROM Reservation WHERE id='.$_GET['idReservation']);
$donnees = $response -> fetch();
echo '<form action="" method="post">
<input type="text" name="nom" value=" .$donnees['nom'].'"/>
<input type="text" name="tempsReservation" value=" .$donnees['tempsReservation'].'"/>
<input type="submit"/>';


php?>